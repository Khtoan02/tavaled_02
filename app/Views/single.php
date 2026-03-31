<?php view('layouts/header', ['title' => get_the_title()]); ?>

<style>
/* ── SINGLE POST CSS ── */
.single-post-wrapper {
  --orange:     #f05a25;
  --orange-dk:  #c8451a;
  --orange-lt:  #fde8df;
  --orange-xlt: #fff4f0;
  --ink:        #111827;
  --mid:        #374151;
  --muted:      #6b7280;
  --light:      #9ca3af;
  --border:     #eeddd6;
  --border-lt:  #f5e8e2;

  font-family: var(--font-heading);
  color: var(--ink);
  font-size: 15px;
  line-height: 1.6;
}

/* Include font in page */


/* Progress Bar */
.progress-bar {
  position: fixed;
  top: 0; left: 0;
  height: 3px;
  background: linear-gradient(90deg, var(--orange), var(--orange-dk));
  width: 0%;
  z-index: 9999;
  transition: width .1s linear;
  box-shadow: 0 0 8px rgba(240,90,37,.5);
}

/* HERO HEADER */
.post-hero {
  position: relative;
  overflow: hidden;
  background: var(--ink);
  margin-top: -1px; /* Avoid gap */
}

.post-hero__img {
  width: 100%;
  height: 520px;
  object-fit: cover;
  object-position: center;
  display: block;
  opacity: 0.42;
  filter: saturate(0.6);
}

.post-hero__overlay {
  position: absolute; inset: 0;
  background: linear-gradient(
    180deg,
    rgba(17,24,39,.1) 0%,
    rgba(17,24,39,.3) 40%,
    rgba(17,24,39,.85) 100%
  );
}

.post-hero__grid {
  position: absolute; inset: 0;
  background-image:
    linear-gradient(rgba(255,255,255,.025) 1px, transparent 1px),
    linear-gradient(90deg, rgba(255,255,255,.025) 1px, transparent 1px);
  background-size: 56px 56px;
  pointer-events: none;
}

.post-hero__content {
  position: absolute; bottom: 0; left: 0; right: 0;
  padding: 0 0 52px;
  max-width: 1200px; margin: 0 auto;
  padding-left: 32px; padding-right: 32px;
}

.post-hero__content::before {
  content: '';
  position: absolute;
  left: 32px; bottom: 52px;
  width: 4px; height: 72px;
  background: linear-gradient(180deg, var(--orange), var(--orange-dk));
  border-radius: 3px;
  transform: translateX(-20px);
  opacity: 0;
  animation: slideIn .6s .3s ease forwards;
}
@keyframes slideIn { to { transform: translateX(0); opacity: 1; } }

.post-hero__inner { padding-left: 20px; }

.post-hero__breadcrumb {
  display: flex; align-items: center; gap: 8px;
  font-size: 11.5px; font-weight: 600;
  letter-spacing: 0.12em; text-transform: uppercase;
  color: rgba(255,255,255,.55); margin-bottom: 16px;
  opacity: 0; animation: fadeUp .5s .2s ease forwards;
}
.post-hero__breadcrumb a { color: var(--orange); text-decoration: none; }
.post-hero__breadcrumb span { color: rgba(255,255,255,.3); }

.post-hero__cat {
  display: inline-block;
  background: var(--orange);
  color: #fff; font-size: 10px; font-weight: 700;
  letter-spacing: 0.14em; text-transform: uppercase;
  padding: 4px 12px; border-radius: 4px;
  margin-bottom: 16px;
  opacity: 0; animation: fadeUp .5s .3s ease forwards;
}

.post-hero__title {
  font-family: var(--font-heading);
  font-weight: 700; font-size: clamp(1.9rem, 4vw, 3rem);
  line-height: 1.15; letter-spacing: -0.025em;
  color: #fff; max-width: 820px;
  margin: 0;
  opacity: 0; animation: fadeUp .6s .4s ease forwards;
}

.post-hero__meta {
  display: flex; align-items: center; gap: 14px;
  margin-top: 20px; flex-wrap: wrap;
  opacity: 0; animation: fadeUp .5s .5s ease forwards;
}

.post-hero__author {
  display: flex; align-items: center; gap: 9px;
}
.post-hero__avatar {
  width: 32px; height: 32px; border-radius: 50%;
  border: 2px solid rgba(240,90,37,.6);
  object-fit: cover;
}
.post-hero__author-name {
  font-size: 13px; font-weight: 600; color: rgba(255,255,255,.85);
}

.hero-meta-dot { width: 3px; height: 3px; border-radius: 50%; background: rgba(255,255,255,.3); }

.post-hero__date, .post-hero__readtime {
  font-size: 12px; color: rgba(255,255,255,.5); font-weight: 500;
}
.post-hero__readtime { color: var(--orange); font-weight: 600; }

@keyframes fadeUp {
  from { opacity:0; transform:translateY(16px); }
  to   { opacity:1; transform:translateY(0); }
}

/* LAYOUT: content + sidebar */
.post-layout {
  display: flex !important;
  flex-direction: row !important;
  flex-wrap: nowrap !important;
  align-items: flex-start !important;
  gap: 60px !important;
  max-width: 1600px !important;
  margin: 0 auto !important;
  padding: 60px 32px 80px !important;
  box-sizing: border-box !important;
}

.post-body {
  flex: 1 !important;
  min-width: 0 !important; /* CRITICAL: Allows flex children to shrink below their content size */
  max-width: 100% !important;
}

.sidebar {
  width: 340px !important;
  flex-shrink: 0 !important;
  position: sticky !important;
  top: 120px !important;
  display: flex !important;
  flex-direction: column !important;
  gap: 32px !important;
  align-self: flex-start;
  min-width: 340px !important;
}

/* ARTICLE BODY */
.post-actions {
  display: flex; align-items: center; gap: 10px;
  margin-bottom: 36px;
  padding-bottom: 28px;
  border-bottom: 1px solid var(--border-lt);
}

.action-btn {
  display: inline-flex; align-items: center; gap: 7px;
  font-size: 12px; font-weight: 600; letter-spacing: 0.06em;
  text-transform: uppercase;
  padding: 8px 16px; border-radius: 7px;
  border: 1.5px solid var(--border);
  background: #fff; color: var(--muted);
  cursor: pointer; text-decoration: none;
  transition: border-color .2s, color .2s, background .2s;
}
.action-btn:hover { border-color: var(--orange); color: var(--orange); background: var(--orange-xlt); }
.action-btn svg { width:14px; height:14px; stroke:currentColor; fill:none; stroke-width:1.8; }

.action-btn--orange { background: var(--orange); border-color: var(--orange); color: #fff; }
.action-btn--orange:hover { background: var(--orange-dk); border-color: var(--orange-dk); color: #fff; }

.action-views {
  margin-left: auto;
  display: flex; align-items: center; gap: 6px;
  font-size: 12px; color: var(--muted);
}
.action-views svg { width:14px; height:14px; stroke:var(--light); fill:none; stroke-width:1.8; }

/* Article Typography */
.article h2 {
  font-family: var(--font-heading);
  font-weight: 700; font-size: 1.7rem;
  line-height: 1.45; letter-spacing: -0.01em;
  color: var(--ink); margin: 64px 0 24px;
  position: relative; padding-left: 20px;
}
.article h2::before {
  content: '';
  position: absolute; left: 0; top: 6px; bottom: 6px;
  width: 4px; background: var(--orange); border-radius: 4px;
}
.article h3 {
  font-family: var(--font-heading);
  font-weight: 600; font-size: 1.35rem;
  color: var(--ink); margin: 48px 0 18px;
  line-height: 1.45;
  letter-spacing: -0.01em;
}
.article img, .article figure img {
  display: block;
  width: 100% !important;
  max-width: 100% !important;
  height: auto !important;
  aspect-ratio: 16 / 9 !important;
  object-fit: cover !important;
  border-radius: 12px;
  margin: 42px auto !important;
  box-shadow: 0 10px 30px rgba(0,0,0,0.06);
}
.article figure {
  width: 100% !important;
  max-width: 100% !important;
  margin: 42px 0 !important;
  overflow: hidden !important;
}
.article table {
  display: block;
  width: 100% !important;
  max-width: 100% !important;
  overflow-x: auto;
  border-collapse: collapse;
  white-space: nowrap;
}
.article iframe, .article video {
  width: 100% !important;
  max-width: 100% !important;
  aspect-ratio: 16 / 9;
  border-radius: 12px;
  margin: 42px 0;
}
.article a { color: var(--orange); text-decoration: none; border-bottom: 1px solid rgba(240,90,37,.3); }
.article a:hover { border-color: var(--orange); }

.article blockquote {
  font-size: 1.05rem; color: var(--mid);
  line-height: 1.65; font-style: italic;
  border-left: 3px solid var(--orange);
  padding-left: 20px;
  margin-bottom: 12px;
  background: transparent;
}

/* LIST DESIGNS (UL/OL) */
.article ul, .article ol {
  margin: 12px 0;
  padding-left: 0;
  font-size: 15.5px; color: var(--mid); line-height: 1.65;
  list-style: none;
}
.article ul li, .article ol li {
  position: relative;
  padding-left: 20px;
  margin-bottom: 10px;
}
.article ul li::before {
  content: '';
  position: absolute; left: 0; top: 10px;
  width: 5px; height: 5px; border-radius: 50%;
  background: var(--ink); opacity: 0.6;
}
.article ol { counter-reset: item; }
.article ol li::before {
  content: counter(item) "."; counter-increment: item;
  position: absolute; left: 0; top: 0;
  color: var(--ink); font-weight: bold; opacity: 0.6; background: none; width: auto; height: auto;
}

/* TABLE & VISUAL COMPONENTS */
.article table, .compare-table table { width: 100%; border-collapse: collapse; margin: 16px 0; border-radius: 10px; overflow: hidden; border: 1px solid var(--border); box-shadow: 0 2px 16px rgba(17,24,39,.05); display: table; }
.article thead, .compare-table thead { background: var(--ink); }
.article th, .compare-table th {
  padding: 14px 18px; text-align: left;
  font-size: 13.5px; font-weight: 700; letter-spacing: 0.13em;
  text-transform: uppercase; color: rgba(255,255,255,.7); border: none;
}
.article th:first-child { color: rgba(255,255,255,.4); }
.article tbody tr, .compare-table tbody tr { border-bottom: 1px solid var(--border-lt); }
.article tbody tr:last-child { border-bottom: none; }
.article tbody tr:hover { background: var(--orange-xlt); }
.article td, .compare-table td {
  padding: 13px 18px; font-size: 14.5px; color: var(--mid); border: none;
}
.article td:first-child { color: var(--ink); font-weight: 600; }
.article td.win { color: var(--orange); font-weight: 700; }
.article td.win::after { content: ' ✓'; font-size: 11px; }

/* INFO BOX */
.info-box {
  margin: 16px 0; padding: 20px 24px; background: #fff; border: 1px solid var(--border);
  border-radius: 10px; display: flex; gap: 16px; box-shadow: 0 2px 12px rgba(17,24,39,.04);
}
.info-box__icon {
  width: 40px; height: 40px; flex-shrink: 0; background: var(--orange-xlt); border-radius: 8px;
  display: flex; align-items: center; justify-content: center; font-size: 18px;
}
.info-box__title { font-weight: 700; font-size: 15px; color: var(--ink); margin-bottom: 4px; letter-spacing: 0.02em; }
.info-box__text { font-size: 14.5px; color: var(--muted); line-height: 1.6; margin: 0 !important; }

/* KEY POINTS */
.key-points { margin: 16px 0; list-style: none; padding-left: 0; }
.key-points li {
  padding: 8px 0 8px 28px; position: relative; font-size: 14.5px; color: var(--mid); line-height: 1.6;
  border-bottom: 1px solid var(--border-lt); list-style-type: none;
}
.key-points li:last-child { border-bottom: none; }
.key-points li::before {
  content: ''; position: absolute; left: 0; top: 18px; width: 8px; height: 8px; border-radius: 50%;
  background: var(--orange); opacity: .7;
}

/* IMAGE GRID 2 O */
.img-grid2 { display: grid; grid-template-columns: 1fr 1fr; gap: 12px; margin: 16px 0; }
.img-grid2 img {
  width: 100%; height: 220px; object-fit: cover; object-position: center; border-radius: 8px;
  display: block; filter: saturate(.88); transition: filter .3s;
}
.img-grid2 img:hover { filter: saturate(1); }


/* TAGS */
.post-tags {
  display: flex; flex-wrap: wrap; gap: 8px;
  margin: 48px 0 0;
  padding-top: 32px;
  border-top: 1px solid var(--border-lt);
}
.tag {
  display: inline-block;
  font-size: 11.5px; font-weight: 600;
  letter-spacing: 0.08em; text-transform: uppercase;
  color: var(--muted);
  background: #fff; border: 1.5px solid var(--border);
  padding: 5px 13px; border-radius: 20px;
  text-decoration: none;
  transition: border-color .2s, color .2s, background .2s;
}
.tag:hover { border-color: var(--orange); color: var(--orange); background: var(--orange-xlt); }

/* AUTHOR CARD - Modern Redesign */
.author-card {
  margin-top: 64px;
  padding: 40px;
  background: var(--ink); /* Navy background */
  border-radius: 24px;
  display: flex;
  gap: 32px;
  align-items: center;
  position: relative;
  overflow: hidden;
  box-shadow: 0 20px 40px rgba(29,40,87,0.15);
  color: #fff;
}

.author-card__bg {
  position: absolute;
  top: -20px;
  right: -20px;
  width: 120px;
  height: 120px;
  background: var(--orange);
  border-radius: 50%;
  opacity: 0.1;
  z-index: 0;
}

.author-card__avatar-wrap {
  position: relative;
  flex-shrink: 0;
  z-index: 1;
}

.author-card__avatar {
  width: 100px !important;
  height: 100px !important;
  border-radius: 18px !important; /* Modern rounded square */
  object-fit: cover !important;
  border: 3px solid rgba(255,255,255,0.15) !important;
  box-shadow: 0 10px 25px rgba(0,0,0,0.2) !important;
  aspect-ratio: 1/1 !important; /* Override article global img styles */
  margin: 0 !important;
}

.author-card__content {
  flex: 1;
  z-index: 1;
}

.author-card__eyebrow {
  font-size: 10px;
  font-weight: 700;
  letter-spacing: 0.15em;
  text-transform: uppercase;
  color: var(--orange);
  margin-bottom: 8px;
  opacity: 0.9;
}

.author-card__name {
  font-family: var(--font-heading);
  font-weight: 800;
  font-size: 1.6rem;
  color: #ffffff;
  margin-bottom: 4px;
}

.author-card__role {
  font-size: 11px;
  font-weight: 600;
  color: rgba(255,255,255,0.5);
  margin-bottom: 16px;
  display: flex;
  align-items: center;
  gap: 10px;
}

.author-card__role::after {
  content: '';
  flex: 1;
  height: 1px;
  background: rgba(255,255,255,0.1);
}

.author-card__bio {
  font-size: 14px;
  color: rgba(255,255,255,0.7);
  line-height: 1.6;
  margin-bottom: 20px !important;
}

.author-card__social {
  display: flex;
  gap: 12px;
}

.social-link {
  width: 34px;
  height: 34px;
  display: flex;
  align-items: center;
  justify-content: center;
  background: rgba(255,255,255,0.08);
  border-radius: 8px;
  color: #fff;
  transition: all 0.3s ease;
  font-size: 18px;
}

.social-link:hover {
  background: var(--orange);
  color: #fff;
  transform: translateY(-3px);
}

@media (max-width: 640px) {
  .author-card {
    flex-direction: column;
    text-align: center;
    padding: 32px 24px;
    gap: 20px;
  }
  .author-card__role { justify-content: center; }
  .author-card__role::after { display: none; }
  .author-card__social { justify-content: center; }
}

/* SIDEBAR */
.sidebar {
  position: sticky; top: 100px;
  display: flex; flex-direction: column; gap: 28px;
  align-self: flex-start; height: fit-content;
}
.sidebar-quote {
  background: var(--ink);
  border-radius: 10px; padding: 28px 24px;
  position: relative; overflow: hidden;
  width: 100%;
}
.sidebar-quote::before {
  content: '"'; font-family: var(--font-heading);
  font-size: 9rem; font-weight: 700; font-style: italic;
  color: rgba(255,255,255,.04);
  position: absolute; top: -24px; left: 8px; line-height: 1; pointer-events: none;
}
.sidebar-quote::after {
  content: ''; position: absolute; left:0; top:0; bottom:0; width:3px; background: var(--orange);
}
.sq__text {
  font-family: var(--font-heading); font-style: italic; font-size: 1rem;
  line-height: 1.6; color: rgba(255,255,255,.88); position: relative; z-index:1;
}
.sq__author {
  margin-top: 14px; font-size: 10px; font-weight: 700; letter-spacing: 0.15em; text-transform: uppercase;
  color: var(--orange); display: flex; align-items: center; gap: 7px;
}
.sq__author::before { content:''; display:inline-block; width:16px; height:1.5px; background:var(--orange); }

/* SIDEBAR CTA */
.sidebar-cta {
  background: linear-gradient(135deg, var(--orange) 0%, var(--orange-dk) 100%);
  border-radius: 10px; padding: 28px 22px; text-align: center; position: relative; overflow: hidden;
}
.sidebar-cta::before {
  content:''; position:absolute; width:160px; height:160px; border-radius:50%;
  background:rgba(255,255,255,.07); top:-50px; right:-40px;
}
.sidebar-cta::after {
  content:''; position:absolute; width:90px; height:90px; border-radius:50%;
  background:rgba(255,255,255,.05); bottom:-24px; left:-20px;
}
.sidebar-cta__icon { font-size: 2rem; margin-bottom: 10px; position:relative; z-index:1; }
.sidebar-cta__title { font-family: var(--font-heading); font-weight: 700; font-size: 1.2rem; color: #fff; margin-bottom: 8px; position: relative; z-index:1; }
.sidebar-cta__text { font-size: 12.5px; color: rgba(255,255,255,.8); line-height: 1.6; margin-bottom: 18px; position: relative; z-index:1; }
.sidebar-cta__btn { display: inline-block; background: #fff; color: var(--orange); font-size: 12px; font-weight: 700; text-transform: uppercase; padding: 9px 22px; border-radius: 7px; position: relative; z-index:1; text-decoration: none; }

/* Table of contents */
.toc {
  background: #fff;
  border: 1px solid var(--border);
  border-radius: 10px;
  overflow: hidden;
}
.toc__head {
  padding: 14px 18px;
  background: var(--ink);
  display: flex; align-items: center; gap: 9px;
}
.toc__head-title {
  font-size: 10.5px; font-weight: 700; letter-spacing: 0.16em;
  text-transform: uppercase; color: rgba(255,255,255,.7);
}
.toc__head-line { width: 20px; height: 1.5px; background: var(--orange); border-radius: 2px; }
.toc__list { list-style: none; padding: 12px 0; margin: 0; }
.toc__list li { border-bottom: 1px solid var(--border-lt); padding: 0;}
.toc__list li:last-child { border-bottom: none; }
.toc__list a {
  display: flex; align-items: center; gap: 10px;
  padding: 10px 18px; font-size: 13px;
  color: var(--muted); text-decoration: none; font-weight: 500;
  transition: color .2s, background .2s;
}
.toc__list a:hover { color: var(--orange); background: var(--orange-xlt); }
.toc__num {
  font-family: var(--font-heading);
  font-size: 1.1rem; font-weight: 700;
  color: var(--orange); opacity: .45;
  flex-shrink: 0; width: 18px; text-align: right;
}

/* Sidebar related posts */
.sidebar-related__title {
  font-size: 10.5px; font-weight: 700; letter-spacing: 0.16em;
  text-transform: uppercase; color: var(--muted);
  margin-bottom: 14px;
  display: flex; align-items: center; gap: 8px;
}
.sidebar-related__title::before {
  content:''; display:inline-block; width:16px; height:1.5px; background:var(--orange);
}
.related-mini { display: flex; flex-direction: column; gap: 12px; }
.related-card {
  display: flex; gap: 12px; align-items: center;
  text-decoration: none; padding: 10px;
  border-radius: 8px; background: #fff; border: 1.5px solid var(--border-lt);
  transition: border-color .2s, box-shadow .2s, transform .25s;
}
.related-card:hover {
  border-color: rgba(240,90,37,.25); box-shadow: 0 4px 16px rgba(240,90,37,.1); transform: translateX(3px);
}
.related-card__img {
  width: 64px; height: 52px; flex-shrink: 0; border-radius: 6px; object-fit: cover;
  filter: saturate(.8); transition: filter .3s;
}
.related-card:hover .related-card__img { filter: saturate(1); }
.related-card__title {
  font-family: var(--font-heading);
  font-size: .95rem; font-weight: 700; line-height: 1.3;
  color: var(--ink); transition: color .2s;
}
.related-card:hover .related-card__title { color: var(--orange); }
.related-card__meta { font-size: 10.5px; color: var(--muted); margin-top: 3px; }

/* RELATED SECTION */
.related-section {
  background: #fff;
  border-top: 1px solid var(--border);
  padding: 64px 0;
  margin-top: 0;
}
.related-section .wrap { max-width: 1200px; margin: 0 auto; padding: 0 32px; }
.related-section__head { display: flex; align-items: flex-end; justify-content: space-between; margin-bottom: 32px; }
.related-section__eyebrow { font-size: 10.5px; font-weight: 600; letter-spacing: 0.2em; text-transform: uppercase; color: var(--orange); opacity: .8; margin-bottom: 6px; display: flex; align-items: center; gap: 8px; }
.related-section__eyebrow::before { content:''; display:inline-block; width:22px; height:1.5px; background:var(--orange); }
.related-section__title { font-family: var(--font-heading); font-weight: 700; font-size: 2rem; color: var(--ink); }
.related-section__more { font-size: 11.5px; font-weight: 600; color: var(--muted); text-decoration: none; letter-spacing: 0.08em; text-transform: uppercase; border-bottom: 1.5px solid var(--border-lt); padding-bottom: 1px; }

.related-grid { display: grid; grid-template-columns: repeat(3,1fr); gap: 20px; }

/* RESPONSIVE */
@media (max-width: 1200px) {
  .post-layout { gap: 40px !important; }
  .sidebar { width: 300px !important; min-width: 300px !important; }
}

@media (max-width: 1024px) {
  .post-layout { flex-direction: column !important; padding-top: 40px !important; }
  .post-body, .sidebar { width: 100% !important; max-width: 100% !important; min-width: 100% !important; }
  .sidebar { position: static !important; }
}

@media (max-width: 640px) {
  .post-layout { padding: 36px 18px 80px !important; }
  .post-hero__img { height: 320px !important; }
  .post-hero__title { font-size: 1.65rem !important; }
  .related-grid { grid-template-columns: 1fr !important; }
}
</style>

<div class="single-post-wrapper">
    <!-- Progress bar -->
    <div class="progress-bar" id="progressBar"></div>

    <?php 
    $thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
    if (!$thumbnail_url) {
        $thumbnail_url = 'https://images.unsplash.com/photo-1518770660439-4636190af475?w=1400&q=85'; // Demo fallback
    }
    $categories = get_the_category();
    $cat_name = !empty($categories) ? esc_html($categories[0]->name) : 'Tin tức';
    $cat_link = !empty($categories) ? esc_url(get_category_link($categories[0]->term_id)) : '#';
    ?>

    <!-- ══ HERO ══ -->
    <section class="post-hero">
    <img class="post-hero__img" src="<?php echo esc_url($thumbnail_url); ?>" alt="<?php echo esc_attr(get_the_title()); ?>">
    <div class="post-hero__overlay"></div>
    <div class="post-hero__grid"></div>
    <div class="post-hero__content">
        <div class="post-hero__inner">
        <div class="post-hero__breadcrumb">
            <a href="<?php echo esc_url(home_url('/')); ?>">Trang chủ</a>
            <span>/</span>
            <a href="<?php echo $cat_link; ?>"><?php echo $cat_name; ?></a>
            <span>/</span>
            <span style="color:rgba(255,255,255,.4)">Bài viết</span>
        </div>
        <span class="post-hero__cat"><?php echo $cat_name; ?></span>
        <h1 class="post-hero__title"><?php the_title(); ?></h1>
        <div class="post-hero__meta">
            <div class="post-hero__author">
            <?php echo get_avatar(get_the_author_meta('ID'), 32, '', '', ['class' => 'post-hero__avatar']); ?>
            <span class="post-hero__author-name"><?php the_author(); ?></span>
            </div>
            <span class="hero-meta-dot"></span>
            <span class="post-hero__date"><?php echo get_the_date(); ?></span>
            <span class="hero-meta-dot"></span>
            <span class="post-hero__readtime">⏱ <?php echo ceil(str_word_count(strip_tags(get_the_content())) / 200); ?> phút đọc</span>
        </div>
        </div>
    </div>
    </section>

    <!-- ══ POST LAYOUT ══ -->
    <div class="post-layout">

        <!-- ── ARTICLE CONTENT ── -->
        <article class="post-body">

            <!-- Action bar -->
            <div class="post-actions">
                <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_permalink()); ?>" target="_blank" class="action-btn">
                    <svg viewBox="0 0 24 24"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/></svg>
                    Chia sẻ
                </a>
                <a href="#" class="action-btn action-btn--orange">
                    <svg viewBox="0 0 24 24"><path d="M19 21l-7-5-7 5V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z"/></svg>
                    Lưu bài
                </a>
                <div class="action-views">
                    <svg viewBox="0 0 24 24"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                    <?php echo rand(500, 3000); ?> lượt xem
                </div>
            </div>

            <!-- Article -->
            <div class="article">
                <?php the_content(); ?>

                <!-- Tags -->
                <?php
                $tags = get_the_tags();
                if ($tags) {
                    echo '<div class="post-tags">';
                    foreach ($tags as $tag) {
                        echo '<a href="' . esc_url(get_tag_link($tag->term_id)) . '" class="tag">' . esc_html($tag->name) . '</a>';
                    }
                    echo '</div>';
                }
                ?>

            </div><!-- /article -->
            
            <!-- Author box Modernized -->
            <div class="author-card anim d4">
                <div class="author-card__bg"></div>
                <div class="author-card__avatar-wrap">
                    <?php echo get_avatar(get_the_author_meta('ID'), 100, '', '', ['class' => 'author-card__avatar']); ?>
                </div>
                <div class="author-card__content">
                    <div class="author-card__eyebrow">Người viết bài</div>
                    <h3 class="author-card__name"><?php the_author(); ?></h3>
                    <div class="author-card__role">Quản trị viên · <?php echo esc_html(\App\Helpers\ThemeHelper::getOption('company_name', get_bloginfo('name'))); ?></div>
                    <p class="author-card__bio"><?php echo get_the_author_meta('description') ?: 'Chuyên gia cung cấp tài liệu kỹ thuật và giải pháp hiển thị, sự kiện.'; ?></p>
                    <div class="author-card__social">
                        <a href="mailto:<?php echo get_the_author_meta('user_email'); ?>" class="social-link" title="Email"><i class="ph ph-envelope"></i></a>
                        <a href="#" class="social-link" title="LinkedIn"><i class="ph ph-linkedin-logo"></i></a>
                        <a href="#" class="social-link" title="Facebook"><i class="ph ph-facebook-logo"></i></a>
                    </div>
                </div>
            </div>
        </article>

        <!-- ── SIDEBAR ── -->
        <aside class="sidebar block">
            <!-- TOC Widget -->
            <div class="toc mb-8" id="toc-container" style="display:none;">
                <div class="toc__head">
                    <div class="toc__head-line"></div>
                    <span class="toc__head-title">Mục lục bài viết</span>
                </div>
                <ul class="toc__list" id="toc-list"></ul>
            </div>

            <!-- Quote widget -->
            <div class="sidebar-quote mb-8">
                <p class="sq__text">Ánh sáng đúng chỗ, đúng lúc không chỉ truyền tải thông tin — nó định hình cảm xúc và ký ức của người nhìn.</p>
                <div class="sq__author">TavaLLS</div>
            </div>

            <!-- Bài Viết Được Đề Xuất (Recent Posts) -->
            <?php if (!empty($recent_posts)): ?>
            <div class="sidebar-related mb-8">
                <div class="sidebar-related__title">Bài viết mới</div>
                <div class="related-mini">
                    <?php foreach($recent_posts as $rp): ?>
                    <a href="<?php echo get_permalink($rp->ID); ?>" class="related-card">
                        <?php $rt = get_the_post_thumbnail_url($rp->ID, 'thumbnail'); if(!$rt) $rt='https://images.unsplash.com/photo-1518770660439-4636190af475?w=200&q=80'; ?>
                        <img class="related-card__img" src="<?php echo esc_url($rt); ?>" alt="">
                        <div>
                            <div class="related-card__title"><?php echo esc_html($rp->post_title); ?></div>
                            <div class="related-card__meta"><?php echo get_the_date('j/m', $rp->ID); ?></div>
                        </div>
                    </a>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php endif; ?>

            <!-- Sản Phẩm Nổi Bật (Recent/Featured Products) -->
            <?php if (!empty($recent_products)): ?>
            <div class="sidebar-related mb-8">
                <div class="sidebar-related__title text-brand-orange">Sản phẩm nổi bật</div>
                <div class="related-mini">
                    <?php foreach($recent_products as $rp): ?>
                    <a href="<?php echo get_permalink($rp->ID); ?>" class="related-card border-brand-orange/20 hover:border-brand-orange/50">
                        <?php $rt = get_the_post_thumbnail_url($rp->ID, 'thumbnail'); if(!$rt) $rt='https://images.unsplash.com/photo-1518770660439-4636190af475?w=200&q=80'; ?>
                        <img class="related-card__img" src="<?php echo esc_url($rt); ?>" alt="">
                        <div>
                            <div class="related-card__title !text-brand-orange"><?php echo esc_html($rp->post_title); ?></div>
                        </div>
                    </a>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php endif; ?>

            <!-- CTA banner -->
            <div class="sidebar-cta">
                <div class="sidebar-cta__icon">💬</div>
                <div class="sidebar-cta__title">Cần tư vấn dự án?</div>
                <p class="sidebar-cta__text">Đội ngũ kỹ thuật TavaLLS sẵn sàng phân tích và báo giá miễn phí cho dự án của bạn.</p>
                <a href="<?php echo esc_url(home_url('/lien-he')); ?>" class="sidebar-cta__btn">Liên hệ ngay</a>
            </div>
        </aside>
    </div><!-- /post-layout -->

    <!-- ══ RELATED POSTS SECTION ══ -->
    <section class="related-section">
    <div class="wrap">
        <div class="related-section__head">
        <div>
            <div class="related-section__eyebrow">Tin tham khảo</div>
            <h2 class="related-section__title">Bài Viết <em>Liên Quan</em></h2>
        </div>
        <a href="<?php echo $cat_link; ?>" class="related-section__more">Xem thêm →</a>
        </div>

        <div class="related-grid pt-4">
            <?php
            // Lấy trực tiếp từ WP_Query (mẫu mã ở trên controller, nhưng controller cũng gửi biến $related_posts)
            if (!empty($related_posts)) {
                global $post;
                foreach ($related_posts as $p) {
                    $post = $p;
                    setup_postdata($post);
                    
                    $thumb = get_the_post_thumbnail_url($post->ID, 'medium');
                    if (!$thumb) $thumb = 'https://images.unsplash.com/photo-1519389950473-47ba0277781c?w=500&q=80';
                    ?>
                    <!-- Card (from blog) -->
                    <div class="card overflow-hidden rounded-xl border border-gray-200 hover:shadow-xl transition-all shadow-sm bg-white cursor-pointer" onclick="window.location.href='<?php the_permalink(); ?>'">
                        <div class="card__thumb relative h-48 overflow-hidden">
                            <img src="<?php echo esc_url($thumb); ?>" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" alt="<?php the_title(); ?>">
                            <?php $cats = get_the_category(); if(!empty($cats)): ?>
                            <span class="cat absolute top-3 left-3 bg-white/90 backdrop-blur px-3 py-1 rounded-sm text-[10px] font-bold uppercase tracking-wider text-gray-800 z-10"><?php echo esc_html($cats[0]->name); ?></span>
                            <?php endif; ?>
                        </div>
                        <div class="card__body p-5 flex flex-col items-start h-full">
                            <h3 class="card__title font-serif font-bold text-lg leading-tight text-gray-900 mb-3 hover:text-brand-orange transition-colors" style="font-family: var(--font-heading);"><?php the_title(); ?></h3>
                            <div class="text-xs text-gray-500 flex items-center gap-2 mt-auto pt-4 border-t border-gray-100 w-full">
                                <span><?php echo get_the_date('j/m/Y'); ?></span>
                                <span class="w-1 h-1 rounded-full bg-gray-300"></span>
                                <span><?php echo ceil(str_word_count(strip_tags(get_the_content())) / 200); ?> phút</span>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                wp_reset_postdata();
            } else {
                echo '<p class="text-gray-500 italic">Hiện tại chưa có bài viết liên quan.</p>';
            }
            ?>
        </div>
    </div>
    </section>
</div>

<script>
// Reading progress bar & TOC Generation
document.addEventListener('DOMContentLoaded', () => {
    // Progress Bar
    const bar = document.getElementById('progressBar');
    if (bar) {
        window.addEventListener('scroll', () => {
            const doc = document.documentElement;
            const scrollTop = doc.scrollTop || document.body.scrollTop;
            const scrollHeight = doc.scrollHeight - doc.clientHeight;
            const pct = scrollHeight > 0 ? (scrollTop / scrollHeight) * 100 : 0;
            bar.style.width = pct + '%';
        });
    }

    // Generate TOC dynamically from article headings
    const headings = document.querySelectorAll('.article h2, .article h3');
    const tocList = document.getElementById('toc-list');
    const tocContainer = document.getElementById('toc-container');
    
    if (headings.length > 0 && tocList && tocContainer) {
        tocContainer.style.display = 'block';
        let count = 1;
        headings.forEach((h, index) => {
            if (!h.id) {
                h.id = 'heading-' + index;
            }
            const li = document.createElement('li');
            const a = document.createElement('a');
            a.href = '#' + h.id;
            
            // Format number as 01, 02...
            let numStr = count < 10 ? '0' + count : count;
            
            if (h.tagName === 'H2') {
                a.innerHTML = `<span class="toc__num">${numStr}</span>${h.innerText}`;
                count++;
            } else {
                a.innerHTML = `<span class="toc__num ml-3 scale-75 opacity-20">-</span><span class="pl-1">${h.innerText}</span>`;
            }
            
            // Smooth scroll adjustment
            a.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.getElementById(h.id);
                if (target) {
                    window.scrollTo({
                        top: target.offsetTop - 100, // offset for sticky header
                        behavior: 'smooth'
                    });
                }
            });
            
            li.appendChild(a);
            tocList.appendChild(li);
        });
    }
});
</script>

<?php view('layouts/footer'); ?>
