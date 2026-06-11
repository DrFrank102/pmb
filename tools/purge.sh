#!/usr/bin/env bash
# =============================================================================
# purge.sh — Force-clear all server and CDN cache layers
# =============================================================================
#
# Usage:
#   ./tools/purge.sh
#
# Flushes WordPress object cache and LiteSpeed ESI cache, then re-fetches
# every public page so HCDN edge servers immediately serve fresh content
# rather than waiting for the 300 s TTL to expire naturally.
#
# =============================================================================

set -euo pipefail

HOST="157.173.209.185"
USER="u760117538"
SITE="https://pmb.kelwynmanor.org"

# Pages to re-prime after purge — extend this list as pages are added
PAGES=(
	"/"
)

echo ""
echo "── Flushing caches ────────────────────────────────────────────────────────"
WP_ROOT="/home/${USER}/domains/pmb.kelwynmanor.org/public_html"
SSH="ssh -p 65002 ${USER}@${HOST}"

${SSH} "wp cache flush --path=${WP_ROOT} --allow-root"

if ${SSH} "wp litespeed-purge all --path=${WP_ROOT} --allow-root" 2>/dev/null; then
    :
else
    echo "litespeed-purge all unavailable — purging by URL"
    for page in "${PAGES[@]}"; do
        ${SSH} "wp litespeed-purge url '${SITE}${page}' --path=${WP_ROOT} --allow-root" 2>/dev/null || true
    done
fi

echo ""
echo "── Re-priming pages ───────────────────────────────────────────────────────"
for page in "${PAGES[@]}"; do
	echo "   ${SITE}${page}"
	curl -s "${SITE}${page}" -o /dev/null
done

echo ""
echo "Purge complete — all pages re-primed."
