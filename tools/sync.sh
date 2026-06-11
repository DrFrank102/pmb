#!/usr/bin/env bash
# =============================================================================
# sync.sh — pull live theme files from production back into the local repo
# =============================================================================
#
# Usage:
#   bash tools/sync.sh              — pull changes, commit, and push
#   bash tools/sync.sh --dry-run    — preview what would change (no writes)
#   bash tools/sync.sh --no-commit  — pull changes but skip git commit/push
#
# Use this when you've edited theme files directly on the server and need
# to bring those changes back into git.
#
# =============================================================================

set -euo pipefail

HOST="157.173.209.185"
USER="u760117538"
REMOTE_THEME="/home/u760117538/domains/pmb.kelwynmanor.org/public_html/wp-content/themes/kadence-child"

REPO_ROOT="$(cd "$(dirname "$0")/.." && pwd)"

DRY_RUN=0
NO_COMMIT=0
for arg in "${@}"; do
    [[ "$arg" == "--dry-run"   ]] && DRY_RUN=1
    [[ "$arg" == "--no-commit" ]] && NO_COMMIT=1
done

[[ $DRY_RUN -eq 1 ]] && echo "=== DRY RUN — no files will be written ==="

RSYNC_OPTS=(
    rsync
    --archive
    --compress
    --human-readable
    --itemize-changes
    --rsh="ssh -p 65002"
    --exclude=".git/"
    --exclude=".claude/"
    --exclude=".github/"
    --exclude=".DS_Store"
    --exclude="CLAUDE.md"
    --exclude="README.md"
    --exclude="tools/"
    --exclude="docs/"
    --exclude="screenshot.png"
)
[[ $DRY_RUN -eq 1 ]] && RSYNC_OPTS+=(--dry-run)

echo ""
echo "── Pulling from server ────────────────────────────────────────────────"
echo "   ${USER}@${HOST}:${REMOTE_THEME}/"
echo "→  ${REPO_ROOT}/"
echo ""

"${RSYNC_OPTS[@]}" \
    "${USER}@${HOST}:${REMOTE_THEME}/" \
    "${REPO_ROOT}/"

echo ""

if [[ $DRY_RUN -eq 1 ]]; then
    echo "Dry run complete — nothing written."
    exit 0
fi

# ── Git ────────────────────────────────────────────────────────────────────

cd "$REPO_ROOT"

if git diff --quiet && git diff --cached --quiet; then
    echo "No changes detected — working tree is already in sync."
    exit 0
fi

echo "── Changed files ──────────────────────────────────────────────────────"
git diff --stat
echo ""

if [[ $NO_COMMIT -eq 1 ]]; then
    echo "Skipping commit (--no-commit). Stage and commit manually when ready."
    exit 0
fi

DEFAULT_MSG="Sync theme edits made directly on the server"
echo "Commit message (press Enter to use default):"
echo "  \"${DEFAULT_MSG}\""
read -r USER_MSG
COMMIT_MSG="${USER_MSG:-$DEFAULT_MSG}"

git add -A
git commit -m "${COMMIT_MSG}

Co-Authored-By: Claude Sonnet 4.6 <noreply@anthropic.com>"
git push

echo ""
echo "Sync complete — local repo and remote are up to date."
