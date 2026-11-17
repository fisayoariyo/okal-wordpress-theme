document.addEventListener('DOMContentLoaded', function () {

  /* Mobile menu */
  var menuToggle = document.getElementById('menuToggle');
  var mobileMenu = document.getElementById('mobileMenu');
  var closeMenu  = document.getElementById('closeMenu');
  if (menuToggle && mobileMenu) {
    menuToggle.addEventListener('click', function () { mobileMenu.classList.add('open'); });
  }
  if (closeMenu && mobileMenu) {
    closeMenu.addEventListener('click', function () { mobileMenu.classList.remove('open'); });
  }
  if (mobileMenu) {
    mobileMenu.querySelectorAll('a').forEach(function (a) {
      a.addEventListener('click', function () { mobileMenu.classList.remove('open'); });
    });
  }

  /* Verse-nav scrollspy (only meaningful on the front page, which has #home/#music/#connect anchors) */
  var navLinks = document.querySelectorAll('#versenav a');
  var sections = document.querySelectorAll('section[id]');
  if (navLinks.length && sections.length) {
    window.addEventListener('scroll', function () {
      var current = sections[0].id;
      sections.forEach(function (s) {
        if (window.scrollY >= s.offsetTop - window.innerHeight / 2) current = s.id;
      });
      navLinks.forEach(function (a) {
        a.classList.toggle('active', a.getAttribute('href') === '#' + current);
      });
    });
  }

  /* Mock global player */
  var player = document.getElementById('player');
  var playBtn = document.getElementById('playBtn');
  if (player && playBtn) {
    playBtn.addEventListener('click', function () {
      player.classList.toggle('playing');
      playBtn.textContent = player.classList.contains('playing') ? '❚❚' : '▶';
    });
  }

  /* Music page: artist bio "More/Less" toggle */
  var bioToggle = document.querySelector('[data-bio-toggle]');
  if (bioToggle) {
    bioToggle.addEventListener('click', function () {
      var bio = bioToggle.closest('[data-bio]');
      var expanded = bio.classList.toggle('expanded');
      bioToggle.textContent = expanded ? 'Less' : 'More';
    });
  }

  /* Music page: mock shuffle button */
  var shuffleBtn = document.getElementById('shuffleBtn');
  if (shuffleBtn) {
    shuffleBtn.addEventListener('click', function () {
      var rows = document.querySelectorAll('.song-row');
      if (rows.length) {
        var pick = rows[Math.floor(Math.random() * rows.length)];
        pick.style.background = 'var(--bg-soft)';
        setTimeout(function () { pick.style.background = ''; }, 600);
      }
    });
  }

  /* Dismissible announcement banner */
  var announceBtn = document.querySelector('#announce button');
  if (announceBtn) {
    announceBtn.addEventListener('click', function () {
      announceBtn.parentElement.style.display = 'none';
    });
  }
});
