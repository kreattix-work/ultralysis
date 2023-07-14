const body = document.querySelector("body");

function toggleSider() {
  body.classList.toggle("close-sider");
}

function slideDown(element, duration = 250) {
  element.style.overflow = "hidden";
  element.style.display = "block";
  const startHeight = element.offsetHeight;
  element.style.height = "0";

  animate({
    duration: duration,
    timing: function (timeFraction) {
      return timeFraction;
    },
    draw: function (progress) {
      element.style.height = startHeight * progress + "px";
    },
  });
}

function slideUp(element, duration = 250) {
  element.style.overflow = "hidden";
  const startHeight = element.offsetHeight;

  animate({
    duration: duration,
    timing: function (timeFraction) {
      return timeFraction;
    },
    draw: function (progress) {
      element.style.height = startHeight * (1 - progress) + "px";
    },
    complete: function () {
      element.style.display = "none";
    },
  });
  setTimeout(function () {
    element.style.height = "";
    element.style.overflow = "";
  }, duration + 10);
}

function slideToggle(element, duration = 250) {
  if (window.getComputedStyle(element).display === "none") {
    slideDown(element, duration);
  } else {
    slideUp(element, duration);
  }
}

function animate(options) {
  const start = performance.now();
  requestAnimationFrame(function animateFrame(time) {
    let timeFraction = (time - start) / options.duration;
    if (timeFraction > 1) timeFraction = 1;

    const progress = options.timing(timeFraction);
    options.draw(progress);

    if (timeFraction < 1) {
      requestAnimationFrame(animateFrame);
    } else if (typeof options.complete === "function") {
      options.complete();
    }
  });
}

function toggleMenu(element) {
  slideToggle(element.nextElementSibling);
}
