const body = document.querySelector("body");

function toggleSider() {
    if(window.innerWidth  <= 1024) {
      body.classList.remove("close-sider");
      body.classList.toggle("open-sider");
    }else{
      body.classList.remove("open-sider");
      body.classList.toggle("close-sider");
    }

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

function positionDropdown(element, dropdown) {
  var rectElement = element.getBoundingClientRect();
  var rectDropdown = dropdown.getBoundingClientRect();
  console.log(element.getAttribute("placement"));
  if (element.getAttribute("placement") === "bottom") {
    dropdown.style.top = rectElement.bottom + 8 + "px";
    dropdown.style.left =
      rectElement.left - Math.abs(rectElement.width - rectDropdown.width) / 2 + "px";
  } else {
    dropdown.style.top = rectElement.top + "px";
    dropdown.style.left = rectElement.left - rectDropdown.width - 8 + "px";
  }
}

function dropdownMenu(element) {
  const opened = document.querySelector(".dropdown-menu-open");
  if (opened) {
    opened.remove();
  }
  if (!element.classList.contains("active")) {
    const allElements = document.querySelectorAll(".dropdown-menu-toggle");
    allElements.forEach((el) => {
      el.classList.remove("active");
    });
    const dropdown = element.nextElementSibling;
    const dropdownClone = dropdown.cloneNode(true);
    const pageBody = document.body;

    element.classList.add("active");
    dropdownClone.classList.add("dropdown-menu-open");
    pageBody.appendChild(dropdownClone);
    positionDropdown(element, dropdownClone);
  } else {
    const allElements = document.querySelectorAll(".dropdown-menu-toggle");
    allElements.forEach((el) => {
      el.classList.remove("active");
    });
  }
}

document.addEventListener("click", function (event) {
  if (!event.target.closest(".dropdown-menu-toggle")) {
    var dropdown = document.querySelector(".dropdown-menu-open");
    if (dropdown) {
      dropdown.remove();
    }
    const allElements = document.querySelectorAll(".dropdown-menu-toggle");
    allElements.forEach((el) => {
      el.classList.remove("active");
    });
  }
});

function removeParent(element) {
  element.parentElement.remove();
}

$(function () {
  $(".select2").select2({
    theme: "bootstrap-5",
    minimumResultsForSearch: -1,
  });

  $(".select2-sm").select2({
    theme: "bootstrap-5",
    minimumResultsForSearch: -1,
    templateResult: function (data, container) {
      if (data.element) {
        $(container).addClass("select2-sm-option");
      }

      return data.text;
    },
  });
});

window.addEventListener('scroll',(event) => {
  el = document.querySelector('.affix-to-header')
  if(window.scrollY > 100) {
    el.classList.add('fixed-to-header')
  }else {
    el.classList.remove('fixed-to-header')
  }
});