# Online_Store

Static storefront landing page for the Electricin electronics shop. Built with HTML, Bootstrap, and a custom stylesheet, with a carousel and product slider on the homepage.

## Project structure
- `index.html` - Main landing page
- `assets/` - Images, CSS, and slider assets
- `userlogin/` - Login page(s)
- `useraccounts/` - Account-related pages

## How to run
1. Open `index.html` in a browser.
2. The page loads assets from `assets/` and external CDNs (Bootstrap, Font Awesome, jQuery, LightSlider).

## Configuration
The PHP pages expect database credentials via environment variables:
- `DB_HOST` (default: `localhost`)
- `DB_NAME` (default: `useraccounts`)
- `DB_USER` (required)
- `DB_PASS` (required)

## Notes
- This is a static project; no build step is required.
- If the CDN links are unavailable, the page will render without those libraries.
