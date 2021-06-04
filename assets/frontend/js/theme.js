! function (e) {
	"use strict";
	initPageTransition(), [].forEach.call(document.querySelectorAll(".thumbnail-gallery-wrapper"), function (i) {
		var t = new Swiper(".thumbnail-gallery-wrapper .thumbnails .swiper-container", {
			slidesPerView: "auto",
			mousewheel: !0,
			freeMode: !0,
			scrollbar: {
				el: ".swiper-scrollbar"
			}
		});

		function a() {
			t.slideTo(this.realIndex, 300), e(".thumbnail-gallery-wrapper .thumbnails .swiper-slide").removeClass("is-active"), t.slides[this.realIndex].classList.add("is-active")
		}
		window.addEventListener("load", function () {
			var e = new Swiper(".thumbnail-gallery-wrapper .full-images .swiper-container", {
				effect: "fade",
				loop: !0,
				keyboard: !0,
				on: {
					init: a,
					slideChange: a
				},
				autoplay: {
					delay: 5e3
				}
			});
			[].forEach.call(t.slides, function (i, t) {
				i.addEventListener("click", function () {
					e.slideToLoop(t, 600)
				})
			})
		}), e(i).on("click", ".thumbs-btn", function () {
			i.classList.toggle("thumbs-visible")
		})
	}), [].forEach.call(document.querySelectorAll(".horizontal-album .swiper-container"), function (e) {
		new Swiper(e, {
			slidesPerView: "auto",
			spaceBetween: 1,
			scrollbar: {
				el: ".swiper-scrollbar",
				draggable: !0
			},
			freeMode: !0,
			mousewheel: {
				forceToAxis: !0,
				invert: !0
			}
		})
	});
	var i = new Swiper(".horizontal-gallery-slider", {
		slidesPerView: "auto",
		mousewheel: !0,
		keyboard: !0,
		on: {
			init: function () {
				window.addEventListener("load", t)
			}
		}
	});

	function t() {
		new LoadImages(document.querySelectorAll(".horizontal-gallery-slider .swiper-slide:not(.hidden) [data-src]"), function (e) {
			e.parentNode.classList.add("loaded"), i.update()
		})
	}
	e(".gallery-wrapper .swiper-filter").on("click", "[data-filter]", function () {
		e(this).addClass("is-active").siblings().removeClass("is-active"), filterSwiper(i, this.getAttribute("data-filter"), t)
	}), e(".gallery-sidebar").on("click", ".mob-sidebar-handle, [data-filter]", function () {
		document.querySelector(".gallery-sidebar").classList.toggle("is-active")
	}), e(".justified-grid-filter").on("click", "[data-filter]", function () {
		e(this).addClass("is-active").siblings().removeClass("is-active"), e(".justified-grid")[0].justified.filter(this.getAttribute("data-filter"))
	}), imagesLoaded(".hr-scrollbar-slider", function () {
		new Swiper(".hr-scrollbar-slider", {
			slidesPerView: "auto",
			spaceBetween: 2,
			mousewheel: !0,
			keyboard: !0,
			scrollbar: {
				el: document.querySelector(".hr-swiper-scrollbar"),
				draggable: !0,
				dragSize: 60,
				snapOnRelease: !1,
				hide: !1
			}
		})
	}), new Swiper(".swiper-slideshow", {
		effect: "fade",
		simulateTouch: !1,
		keyboard: !0,
		loop: !0,
		autoplay: {
			delay: 5e3,
			disableOnInteraction: !1
		}
	});
	var a = new Swiper(".portfolio-carousel", {
		slidesPerView: 3,
		spaceBetween: 50,
		mousewheel: !0,
		keyboard: !0,
		breakpoints: {
			1350: {
				slidesPerView: 2
			},
			920: {
				slidesPerView: 1
			}
		}
	});

	function r(e) {
		document.querySelectorAll("aside .swiper[data-autoplay]").forEach(function (i) {
			i.swiper.autoplay[e]()
		})
	}

	function l() {
		document.body.classList.remove("aside-is-active"), document.querySelector("header nav").style.paddingRight = "", document.querySelector("main").style.paddingRight = "";
		var e = document.querySelector('[href="#home"]'),
			i = document.querySelector("header .is-active");
		i && i.classList.remove("is-active"), e && e.classList.add("is-active"), history.replaceState(null, null, window.location.pathname + window.location.search), r("stop")
	}
	e(".portfolio-carousel .swiper-slide .inner").each(function (e, i) {
		i.style.transitionDelay = 230 * e + "ms"
	}), e(".portfolio-carousel-filter").on("click", "[data-filter]", function () {
		e(this).addClass("is-active").siblings().removeClass("is-active"), filterSwiper(a, this.getAttribute("data-filter"))
	}), new Swiper(".split-slider", {
		effect: "fade",
		loop: !0,
		mousewheel: !0,
		keyboard: !0,
		simulateTouch: !1,
		autoplay: {
			delay: 5e3,
			disableOnInteraction: !1
		}
	}), new Swiper(".fullscreen-carousel", {
		slidesPerView: 3,
		spaceBetween: 5,
		mousewheel: !0,
		keyboard: !0,
		breakpoints: {
			1350: {
				slidesPerView: 2
			},
			920: {
				slidesPerView: 1
			}
		},
		autoplay: {
			delay: 5e3,
			disableOnInteraction: !1
		}
	}), new Object3D(".object-3d"), [].forEach.call(document.querySelectorAll(".object-3d img"), function (e) {
		var i = e.cloneNode();
		i.classList.add("item-img-shadow"), e.parentNode.insertBefore(i, e)
	}), window.addEventListener("load", function () {
		var i, t;
		new ScrollListener(".animate-items .portfolio-item, .animate-items .spaced-gallery-item", {
				onAppear: function () {
					this.classList.add("is-visible")
				},
				sequenceDelay: 100
			}), e(".portfolio-filter").on("click", "[data-filter]", function () {
				e(".portfolio-item.filtered").addClass("is-visible")
			}),
			function () {
				var e = document.querySelector("main .swiper-progress"),
					i = document.querySelector("main .swiper-container");
				if (e && i && i.swiper) {
					var t = e.querySelector(".inner");
					if (i.swiper.params.autoplay.enabled) {
						var a = parseInt(i.swiper.slides[i.swiper.activeIndex].getAttribute("data-swiper-autoplay"));
						t.style.transitionDuration = (a || i.swiper.params.autoplay.delay) + "ms", e.classList.add("autoplay-running", "fill")
					}
					i.swiper.on("slideChange", function () {
						var i = parseInt(this.slides[this.activeIndex].getAttribute("data-swiper-autoplay"));
						t.style.transitionDuration = (i || this.params.autoplay.delay) + "ms", e.classList.remove("fill"), setTimeout(function () {
							e.classList.add("fill")
						}, 50)
					}), i.swiper.on("autoplayStop", function () {
						e.classList.remove("autoplay-running")
					}), i.swiper.on("autoplayStart", function () {
						e.classList.add("autoplay-running")
					})
				}
				var r = document.querySelector(".swiper-controls .next-btn"),
					l = document.querySelector(".swiper-controls .prev-btn");
				r && l && (r.addEventListener("click", function () {
					i.swiper.slideNext()
				}), l.addEventListener("click", function () {
					i.swiper.slidePrev()
				}))
			}(), r("stop"), i = window.location.hash, (t = document.querySelector('header [href="' + i + '"]')) && t.click()
	}), [].forEach.call(document.querySelectorAll(".close-aside-btn, .home-link, .background-overlay"), function (e) {
		e.addEventListener("click", function (e) {
			e.preventDefault(), l()
		})
	});
	var s = document.querySelector(".aside-inner");
	window.asideScroll = new ScrollListener("aside section[id]", {
		scrollParent: s,
		offsetPercent: 60,
		active: function () {
			var e = document.querySelector('[href="#' + this.id + '"]'),
				i = document.body.classList.contains("aside-is-active");
			if (e && i) {
				var t = document.querySelector("header .is-active");
				t && t.classList.remove("is-active"), e.classList.add("is-active"), window.history.replaceState(null, null, "#" + this.id)
			}
		}
	});
	var o = !1;
	[].forEach.call(document.querySelectorAll(".aside-link"), i => {
		i.addEventListener("click", t => {
			t.preventDefault(),
				function (i) {
					var t = window.innerWidth - document.body.offsetWidth;
					t && (document.querySelector("header nav").style.paddingRight = t + "px", document.querySelector("main").style.paddingRight = t + "px"), document.body.classList.add("aside-is-active"), e("header nav .is-active").removeClass("is-active"), i && i.classList.add("is-active"), r("start"), o || (loadMaps(), o = !0), e(document).one("keyup", function (e) {
						27 == e.keyCode && l()
					});
					var a = i && document.querySelector(i.getAttribute("href"));
					if (a) {
						var n = s.scrollTop + a.getBoundingClientRect().top - s.getBoundingClientRect().top;
						e(s).animate({
							scrollTop: n
						}, 1e3, "easeInOutExpo"), asideScroll.activeCheck()
					} else asideScroll.activeCheck()
				}(i)
		})
	});
	var n = document.querySelector(".map-toggle-btn");
	n && n.addEventListener("click", function () {
		n.classList.toggle("map-is-visible")
	}), e("header").on("click", ".mob-menu-btn", function () {
		e("header").toggleClass("mob-menu-active")
	}), e("body").on("click", ".mob-menu-active nav a", function () {
		e("header").removeClass("mob-menu-active")
	})
}(jQuery);