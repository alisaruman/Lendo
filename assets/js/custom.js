$(document).ready(function () {
  // main swiper
  if (window.innerWidth >= 1024) {
    var swiper = new Swiper("#main-swiper", {
      spaceBetween: 12,
      autoplay: {
        delay: 4500,
        disableOnInteraction: false,
      },
      loop: true,
      navigation: {
        nextEl: "#main-swiper .swiper-button-next",
        prevEl: "#main-swiper .swiper-button-prev",
      },
    });
  } else {
    var swiper = new Swiper("#main-swiper", {
      spaceBetween: 12,
      navigation: {
        nextEl: "#main-swiper .swiper-button-next",
        prevEl: "#main-swiper .swiper-button-prev",
      },
    });
  }
  // main swiper

  // popular swiper
  if (window.innerWidth >= 1024) {
    var swiper = new Swiper("#popular-swiper", {
      spaceBetween: 26,
      slidesPerView: 3,
      autoplay: {
        delay: 4500,
        disableOnInteraction: true,
      },
      navigation: {
        nextEl: "#popular-swiper .swiper-button-next",
        prevEl: "#popular-swiper .swiper-button-prev",
      },
      pagination: {
        el: "#popular-swiper .swiper-pagination",
      },
    });
  } else {
    var swiper = new Swiper("#popular-swiper", {
      spaceBetween: 26,
      slidesPerView: 1,
      navigation: {
        nextEl: "#popular-swiper .swiper-button-next",
        prevEl: "#popular-swiper .swiper-button-prev",
      },
      pagination: {
        el: "#popular-swiper .swiper-pagination",
      },
    });
  }
  // popular swiper

  // swiper button main slider handler
  var coverHeight = $("#slider #main-swiper .cover").innerHeight();
  $("#main-swiper .swiper-button-next").css("top", coverHeight / 2);
  $("#main-swiper .swiper-button-prev").css("top", coverHeight / 2);
  // swiper button main slider handler

  //   mobile menu handler
  $("#hamburger").click(function () {
    if ($(this).hasClass("active")) {
      $(this).removeClass("active");
      $("#mobile-menu").addClass("invisible -right-full opacity-0");
      $("#mobile-menu").removeClass("visible right-0 opacity-100");
      $(this).find(".dash1").css("transform", "translate(0, 0) rotate(0)");
      $(this).find(".dash3").css("transform", "translate(0, 0) rotate(0)");
      $(this).find(".dash2").css("opacity", "1");
    } else {
      $(this).addClass("active");
      $("#mobile-menu").removeClass("invisible -right-full opacity-0");
      $("#mobile-menu").addClass("visible right-0 opacity-100");
      $(this)
        .find(".dash1")
        .css("transform", "translate(0, 5px) rotate(-45deg)");
      $(this)
        .find(".dash3")
        .css("transform", "translate(0, -11px) rotate(45deg)");
      $(this).find(".dash2").css("opacity", "0");
    }
  });

  $("#mobile-menu li.menu-item-has-children").click(function (e) {
    e.preventDefault();
    if ($(this).hasClass("active")) {
      $(this).removeClass("active");
      $(this).find("ul.sub-menu").addClass("invisible max-h-0 opacity-0");
      $(this).find("ul.sub-menu").removeClass("mt-5 max-h-[700px]");
    } else {
      $(this).addClass("active");
      $(this).find("ul.sub-menu").removeClass("invisible max-h-0 opacity-0");
      $(this).find("ul.sub-menu").addClass("mt-5 max-h-[700px]");
    }
  });
  //   mobile menu handler
});
