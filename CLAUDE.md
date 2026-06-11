# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Repository

This is the `pmb` project for the WordPress site at pmb.kelwynmanor.org — a Kadence child theme.

## Theme

- **Active theme**: Kadence child theme (theme name: "Kadence Child")
- **Parent theme**: Kadence (installed on server, not in this repo)
- **Template**: `kadence`

### File layout

| Path | Purpose |
|---|---|
| `style.css` | WordPress theme header + structural CSS (stays at root — WP requires it) |
| `functions.php` | Theme bootstrap: enqueues styles, requires `inc/` modules (stays at root) |
| `css/*.css` | All other stylesheets (e.g. `footer.css`) |
| `inc/*.php` | Feature modules required by `functions.php` |
| `js/*.js` | JavaScript files |
| `tools/` | Deploy and maintenance scripts |

New features follow this convention: one `.php` in `inc/`, one `.css` in `css/`, one `.js` in `js/` (if needed).

### CSS notes

- `style.css` contains structural rules and the WordPress theme header
- CSS version uses `filemtime()` so browser cache is busted on every deploy
- Page-specific stylesheets are conditionally enqueued in `functions.php`

## Front page

`front-page.php` is the home page template. WordPress uses it automatically when a static front page is configured:

- WP Admin → Settings → Reading → "A static page"
- Set **Front page** to any page (e.g. "Home")
- `front-page.php` renders instead of the block editor content

Content recreated from pmboisvertplumbing.com: hero, photo strip, about, brands, services grid, emergency callout, maintenance plan, reviews, contact form.

Photo strip: upload 5 project photos to the WP Media Library and replace the `.pmb-strip__item--placeholder` divs in `front-page.php` with `<img src="..." alt="...">` tags.

Google review link: update the `href` on the "Write a Review" button in `front-page.php` with the actual Google Place ID URL.

## Deployment

```bash
bash tools/deploy.sh          # rsync to production, flush cache, re-prime home page
bash tools/deploy.sh --dry-run
```

- Deploys to: `u760117538@157.173.209.185` (SSH port 65002)
- Remote path: `/home/u760117538/domains/pmb.kelwynmanor.org/public_html/wp-content/themes/kadence-child/`
- After deploy: WP object cache and LiteSpeed cache are flushed, pages re-primed via `tools/purge.sh`
- LiteSpeed public TTL is 300 s (5 min); run `bash tools/purge.sh` to force-clear stale pages

## Git

Line endings are normalized to LF via `.gitattributes`. The only gitignored file is `.DS_Store`.

Always commit and push after deploying.
