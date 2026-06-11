#!/usr/bin/env bash
# =============================================================================
# deploy.sh — rsync the PMB child theme to production
# =============================================================================
#
# Usage:
#   ./tools/deploy.sh            — live deploy
#   ./tools/deploy.sh --dry-run  — preview what would change (no writes)
#
# =============================================================================

set -euo pipefail

HOST="157.173.209.185"
USER="u760117538"
REMOTE_THEME="/home/u760117538/domains/pmb.kelwynmanor.org/public_html/wp-content/themes/kadence-child"

REPO_ROOT="$(cd "$(dirname "$0")/.." && pwd)"

DRY_RUN=0
if [[ "${1:-}" == "--dry-run" ]]; then
    DRY_RUN=1
    echo "=== DRY RUN — no files will be written ==="
fi

RSYNC_BASE=(
    rsync
    --archive
    --compress
    --human-readable
    --itemize-changes
    --delete
    --rsh="ssh -p 65002"
)
[[ $DRY_RUN -eq 1 ]] && RSYNC_BASE+=(--dry-run)

echo ""
echo "── Theme ──────────────────────────────────────────────────────────────"
echo "   ${REPO_ROOT}/"
echo "→  ${USER}@${HOST}:${REMOTE_THEME}/"
echo ""

"${RSYNC_BASE[@]}" \
    --exclude=".git/" \
    --exclude=".claude/" \
    --exclude=".github/" \
    --exclude=".DS_Store" \
    --exclude="CLAUDE.md" \
    --exclude="README.md" \
    --exclude="tools/" \
    --exclude="docs/" \
    --exclude="screenshot.png" \
    "${REPO_ROOT}/" \
    "${USER}@${HOST}:${REMOTE_THEME}/"

echo ""
if [[ $DRY_RUN -eq 1 ]]; then
    echo "Dry run complete — nothing written."
else
    "$(dirname "$0")/purge.sh"
    echo "Deploy complete."
fi
