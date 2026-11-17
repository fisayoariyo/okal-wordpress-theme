=== Okal — Million Dollar Journey ===
A custom WordPress theme built from the iamokal.com site brief.

== Installation ==
1. Zip the theme folder (or use the .zip you were given) and go to
   Appearance → Themes → Add New → Upload Theme in wp-admin.
2. Activate "Okal — Million Dollar Journey".
3. Go to Settings → Reading and set "Your homepage displays" to a
   static page, OR simply leave it on default — front-page.php will
   render automatically once a Page is set as the front page.

== Creating the seven pages from the brief ==
Go to Pages → Add New and create these six pages (Home is handled by
front-page.php automatically, no page needed for it unless you want one
for the URL /home/):

  Page title   Slug        Template to select (top right "Page Attributes")
  -----------  ----------  --------------------------------------------
  About        about       Okal — About
  Music        music       Okal — Music
  Vision       vision      Okal — Vision
  Media        media       Okal — Media
  Journey      journey     Okal — Journey
  Connect      connect     Okal — Connect

For each page, write the main story copy in the normal content editor
(the block editor) and set a Featured Image where relevant (About page
portrait, Media/Journey/Connect intro image). That copy and image are
what appear in the two-column sections on each page — fully editable
by the client with no code.

== The Music page's artist header (banner, audience, followers) ==
The Music page now opens with a full-bleed YouTube-Music-style header:
photo, name, monthly audience stat, a short bio with a "More" toggle,
and Shuffle/Mix/Followers pills — modeled directly on the YouTube
Music artist page.

- Banner photo → set the Music page's own Featured Image.
- Bio text     → the Music page's normal content editor (first two
  lines show by default; "More" expands the rest).
- Audience & followers stats → open the Music page in wp-admin, look
  for the "Artist Header Stats (Music page only)" box in the sidebar,
  and fill in e.g. "2.8m monthly listeners" / "1.5m subscribed".

== Adding content the client will update regularly ==
These live in the WordPress sidebar as their own sections, each with
Title + content editor + Featured Image, exactly like writing a normal
post:

- Music Releases  → each EP/single: cover art (featured image), year,
  type, and a Hafrikplay/streaming link, shown on the Music page's
  "Albums & EPs" grid and as "Latest Release" on Home.
- Top Songs        → the ranked track list at the top of the Music
  page (YouTube-Music-style artist header): song title, thumbnail
  (featured image), play count, album/EP name and streaming link.
  Reorder with the "Order" field under Page Attributes — #1 is
  whatever you set to Order "0".
- The Journey      → journal entries: photo, title, story. Optionally
  grouped with Journal Categories (e.g. "Studio Moments",
  "Reflections", "Milestones").
- Press & Media    → press features shown as chips on the Media page,
  each linking out to the original article/video.
- Milestones       → the vertical timeline on the About page (year +
  description, reorder with the "Order" field under Page Attributes).

== Site-wide text, images and links (no code) ==
Appearance → Customize contains:

- Hero Section (Home)     — eyebrow label, headline, paragraph, hero photo
- Home — Teaser Sections  — the three short paragraphs under "More Than
  Music", "The Story Behind OKAL" and "Building Beyond the Music"
- Announcement Banner     — on/off, text, optional link
- Streaming Platforms     — one URL field per platform (Hafrikplay is
  always shown first/featured)
- Social Links            — Instagram, TikTok, X, Facebook
- Footer & Management     — footer tagline, management company + email
- Site Identity (built into WordPress) — logo, site title, tagline

== Menus ==
Appearance → Menus → create a menu with links to Home/About/Music/
Vision/Media/Journey/Connect, then assign it to "Primary Navigation"
(and optionally "Footer Navigation"). Until a menu is assigned, the
theme falls back to a sensible default automatically.

== Notes for the developer ==
- No plugin dependencies. Custom post types + meta boxes are
  registered in inc/custom-post-types.php and inc/meta-boxes.php.
- Swap the newsletter <form> markup (front-page.php,
  page-templates/template-connect.php) for your ESP's real form/plugin
  shortcode (Mailchimp, Brevo, etc.).
- Swap the Connect page's placeholder <form> for Contact Form 7 /
  WPForms for spam-protected email delivery, per the original brief.
- The floating bottom-left player is a visual placeholder (per the
  brief's "Global Audio Player" note) — wire it up to a real embed
  (Hafrikplay widget, SoundCloud, etc.) when ready.
- Image sizes okal-cover (800×800), okal-portrait (900×1125) and
  okal-wide (1200×750) are registered in functions.php — regenerate
  thumbnails after activating if migrating existing media.
- Version 2 ideas from the brief (merch, tour dates, members area,
  Million Dollar Academy) are intentionally left out of v1 to keep
  the initial build focused, per your own recommendation in the brief.
