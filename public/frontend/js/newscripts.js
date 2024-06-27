function allCloseFun(e, t) {
	$(e).click((function() {
		$(t).toggleClass("hidden")
	}))
}! function(e) {
	"use strict";
	"function" == typeof define && define.amd ? define(["jquery"], e) : "undefined" != typeof exports ? module.exports = e(require("jquery")) : e(jQuery)
}((function(e) {
	"use strict";
	var t = window.Slick || {};
	(t = function() {
		var t = 0;
		return function(i, o) {
			var n, s = this;
			s.defaults = {
				accessibility: !0,
				adaptiveHeight: !1,
				appendArrows: e(i),
				appendDots: e(i),
				arrows: !0,
				asNavFor: null,
				prevArrow: '<button class="slick-prev" aria-label="Previous" type="button">Previous</button>',
				nextArrow: '<button class="slick-next" aria-label="Next" type="button">Next</button>',
				autoplay: !1,
				autoplaySpeed: 3e3,
				centerMode: !1,
				centerPadding: "50px",
				cssEase: "ease",
				customPaging: function(t, i) {
					return e('<button type="button" />').text(i + 1)
				},
				dots: !1,
				dotsClass: "slick-dots",
				draggable: !0,
				easing: "linear",
				edgeFriction: .35,
				fade: !1,
				focusOnSelect: !1,
				focusOnChange: !1,
				infinite: !0,
				initialSlide: 0,
				lazyLoad: "ondemand",
				mobileFirst: !1,
				pauseOnHover: !0,
				pauseOnFocus: !0,
				pauseOnDotsHover: !1,
				respondTo: "window",
				responsive: null,
				rows: 1,
				rtl: !1,
				slide: "",
				slidesPerRow: 1,
				slidesToShow: 1,
				slidesToScroll: 1,
				speed: 500,
				swipe: !0,
				swipeToSlide: !1,
				touchMove: !0,
				touchThreshold: 5,
				useCSS: !0,
				useTransform: !0,
				variableWidth: !1,
				vertical: !1,
				verticalSwiping: !1,
				waitForAnimate: !0,
				zIndex: 1e3
			}, s.initials = {
				animating: !1,
				dragging: !1,
				autoPlayTimer: null,
				currentDirection: 0,
				currentLeft: null,
				currentSlide: 0,
				direction: 1,
				$dots: null,
				listWidth: null,
				listHeight: null,
				loadIndex: 0,
				$nextArrow: null,
				$prevArrow: null,
				scrolling: !1,
				slideCount: null,
				slideWidth: null,
				$slideTrack: null,
				$slides: null,
				sliding: !1,
				slideOffset: 0,
				swipeLeft: null,
				swiping: !1,
				$list: null,
				touchObject: {},
				transformsEnabled: !1,
				unslicked: !1
			}, e.extend(s, s.initials), s.activeBreakpoint = null, s.animType = null, s.animProp = null, s.breakpoints = [], s.breakpointSettings = [], s.cssTransitions = !1, s.focussed = !1, s.interrupted = !1, s.hidden = "hidden", s.paused = !0, s.positionProp = null, s.respondTo = null, s.rowCount = 1, s.shouldClick = !0, s.$slider = e(i), s.$slidesCache = null, s.transformType = null, s.transitionType = null, s.visibilityChange = "visibilitychange", s.windowWidth = 0, s.windowTimer = null, n = e(i).data("slick") || {}, s.options = e.extend({}, s.defaults, o, n), s.currentSlide = s.options.initialSlide, s.originalSettings = s.options, void 0 !== document.mozHidden ? (s.hidden = "mozHidden", s.visibilityChange = "mozvisibilitychange") : void 0 !== document.webkitHidden && (s.hidden = "webkitHidden", s.visibilityChange = "webkitvisibilitychange"), s.autoPlay = e.proxy(s.autoPlay, s), s.autoPlayClear = e.proxy(s.autoPlayClear, s), s.autoPlayIterator = e.proxy(s.autoPlayIterator, s), s.changeSlide = e.proxy(s.changeSlide, s), s.clickHandler = e.proxy(s.clickHandler, s), s.selectHandler = e.proxy(s.selectHandler, s), s.setPosition = e.proxy(s.setPosition, s), s.swipeHandler = e.proxy(s.swipeHandler, s), s.dragHandler = e.proxy(s.dragHandler, s), s.keyHandler = e.proxy(s.keyHandler, s), s.instanceUid = t++, s.htmlExpr = /^(?:\s*(<[\w\W]+>)[^>]*)$/, s.registerBreakpoints(), s.init(!0)
		}
	}()).prototype.activateADA = function() {
		this.$slideTrack.find(".slick-active").attr({
			"aria-hidden": "false"
		}).find("a, input, button, select").attr({
			tabindex: "0"
		})
	}, t.prototype.addSlide = t.prototype.slickAdd = function(t, i, o) {
		var n = this;
		if ("boolean" == typeof i) o = i, i = null;
		else if (i < 0 || i >= n.slideCount) return !1;
		n.unload(), "number" == typeof i ? 0 === i && 0 === n.$slides.length ? e(t).appendTo(n.$slideTrack) : o ? e(t).insertBefore(n.$slides.eq(i)) : e(t).insertAfter(n.$slides.eq(i)) : !0 === o ? e(t).prependTo(n.$slideTrack) : e(t).appendTo(n.$slideTrack), n.$slides = n.$slideTrack.children(this.options.slide), n.$slideTrack.children(this.options.slide).detach(), n.$slideTrack.append(n.$slides), n.$slides.each((function(t, i) {
			e(i).attr("data-slick-index", t)
		})), n.$slidesCache = n.$slides, n.reinit()
	}, t.prototype.animateHeight = function() {
		var e = this;
		if (1 === e.options.slidesToShow && !0 === e.options.adaptiveHeight && !1 === e.options.vertical) {
			var t = e.$slides.eq(e.currentSlide).outerHeight(!0);
			e.$list.animate({
				height: t
			}, e.options.speed)
		}
	}, t.prototype.animateSlide = function(t, i) {
		var o = {},
			n = this;
		n.animateHeight(), !0 === n.options.rtl && !1 === n.options.vertical && (t = -t), !1 === n.transformsEnabled ? !1 === n.options.vertical ? n.$slideTrack.animate({
			left: t
		}, n.options.speed, n.options.easing, i) : n.$slideTrack.animate({
			top: t
		}, n.options.speed, n.options.easing, i) : !1 === n.cssTransitions ? (!0 === n.options.rtl && (n.currentLeft = -n.currentLeft), e({
			animStart: n.currentLeft
		}).animate({
			animStart: t
		}, {
			duration: n.options.speed,
			easing: n.options.easing,
			step: function(e) {
				e = Math.ceil(e), !1 === n.options.vertical ? (o[n.animType] = "translate(" + e + "px, 0px)", n.$slideTrack.css(o)) : (o[n.animType] = "translate(0px," + e + "px)", n.$slideTrack.css(o))
			},
			complete: function() {
				i && i.call()
			}
		})) : (n.applyTransition(), t = Math.ceil(t), !1 === n.options.vertical ? o[n.animType] = "translate3d(" + t + "px, 0px, 0px)" : o[n.animType] = "translate3d(0px," + t + "px, 0px)", n.$slideTrack.css(o), i && setTimeout((function() {
			n.disableTransition(), i.call()
		}), n.options.speed))
	}, t.prototype.getNavTarget = function() {
		var t = this.options.asNavFor;
		return t && null !== t && (t = e(t).not(this.$slider)), t
	}, t.prototype.asNavFor = function(t) {
		var i = this.getNavTarget();
		null !== i && "object" == typeof i && i.each((function() {
			var i = e(this).slick("getSlick");
			i.unslicked || i.slideHandler(t, !0)
		}))
	}, t.prototype.applyTransition = function(e) {
		var t = this,
			i = {};
		!1 === t.options.fade ? i[t.transitionType] = t.transformType + " " + t.options.speed + "ms " + t.options.cssEase : i[t.transitionType] = "opacity " + t.options.speed + "ms " + t.options.cssEase, !1 === t.options.fade ? t.$slideTrack.css(i) : t.$slides.eq(e).css(i)
	}, t.prototype.autoPlay = function() {
		var e = this;
		e.autoPlayClear(), e.slideCount > e.options.slidesToShow && (e.autoPlayTimer = setInterval(e.autoPlayIterator, e.options.autoplaySpeed))
	}, t.prototype.autoPlayClear = function() {
		this.autoPlayTimer && clearInterval(this.autoPlayTimer)
	}, t.prototype.autoPlayIterator = function() {
		var e = this,
			t = e.currentSlide + e.options.slidesToScroll;
		e.paused || e.interrupted || e.focussed || (!1 === e.options.infinite && (1 === e.direction && e.currentSlide + 1 === e.slideCount - 1 ? e.direction = 0 : 0 === e.direction && (t = e.currentSlide - e.options.slidesToScroll, e.currentSlide - 1 == 0 && (e.direction = 1))), e.slideHandler(t))
	}, t.prototype.buildArrows = function() {
		var t = this;
		!0 === t.options.arrows && (t.$prevArrow = e(t.options.prevArrow).addClass("slick-arrow"), t.$nextArrow = e(t.options.nextArrow).addClass("slick-arrow"), t.slideCount > t.options.slidesToShow ? (t.$prevArrow.removeClass("slick-hidden").removeAttr("aria-hidden tabindex"), t.$nextArrow.removeClass("slick-hidden").removeAttr("aria-hidden tabindex"), t.htmlExpr.test(t.options.prevArrow) && t.$prevArrow.prependTo(t.options.appendArrows), t.htmlExpr.test(t.options.nextArrow) && t.$nextArrow.appendTo(t.options.appendArrows), !0 !== t.options.infinite && t.$prevArrow.addClass("slick-disabled").attr("aria-disabled", "true")) : t.$prevArrow.add(t.$nextArrow).addClass("slick-hidden").attr({
			"aria-disabled": "true",
			tabindex: "-1"
		}))
	}, t.prototype.buildDots = function() {
		var t, i, o = this;
		if (!0 === o.options.dots) {
			for (o.$slider.addClass("slick-dotted"), i = e("<ul />").addClass(o.options.dotsClass), t = 0; t <= o.getDotCount(); t += 1) i.append(e("<li />").append(o.options.customPaging.call(this, o, t)));
			o.$dots = i.appendTo(o.options.appendDots), o.$dots.find("li").first().addClass("slick-active")
		}
	}, t.prototype.buildOut = function() {
		var t = this;
		t.$slides = t.$slider.children(t.options.slide + ":not(.slick-cloned)").addClass("slick-slide"), t.slideCount = t.$slides.length, t.$slides.each((function(t, i) {
			e(i).attr("data-slick-index", t).data("originalStyling", e(i).attr("style") || "")
		})), t.$slider.addClass("slick-slider"), t.$slideTrack = 0 === t.slideCount ? e('<div class="slick-track"/>').appendTo(t.$slider) : t.$slides.wrapAll('<div class="slick-track"/>').parent(), t.$list = t.$slideTrack.wrap('<div class="slick-list"/>').parent(), t.$slideTrack.css("opacity", 0), !0 !== t.options.centerMode && !0 !== t.options.swipeToSlide || (t.options.slidesToScroll = 1), e("img[data-lazy]", t.$slider).not("[src]").addClass("slick-loading"), t.setupInfinite(), t.buildArrows(), t.buildDots(), t.updateDots(), t.setSlideClasses("number" == typeof t.currentSlide ? t.currentSlide : 0), !0 === t.options.draggable && t.$list.addClass("draggable")
	}, t.prototype.buildRows = function() {
		var e, t, i, o, n, s, a, d = this;
		if (o = document.createDocumentFragment(), s = d.$slider.children(), d.options.rows > 1) {
			for (a = d.options.slidesPerRow * d.options.rows, n = Math.ceil(s.length / a), e = 0; e < n; e++) {
				var l = document.createElement("div");
				for (t = 0; t < d.options.rows; t++) {
					var r = document.createElement("div");
					for (i = 0; i < d.options.slidesPerRow; i++) {
						var c = e * a + (t * d.options.slidesPerRow + i);
						s.get(c) && r.appendChild(s.get(c))
					}
					l.appendChild(r)
				}
				o.appendChild(l)
			}
			d.$slider.empty().append(o), d.$slider.children().children().children().css({
				width: 100 / d.options.slidesPerRow + "%",
				display: "inline-block"
			})
		}
	}, t.prototype.checkResponsive = function(t, i) {
		var o, n, s, a = this,
			d = !1,
			l = a.$slider.width(),
			r = window.innerWidth || e(window).width();
		if ("window" === a.respondTo ? s = r : "slider" === a.respondTo ? s = l : "min" === a.respondTo && (s = Math.min(r, l)), a.options.responsive && a.options.responsive.length && null !== a.options.responsive) {
			for (o in n = null, a.breakpoints) a.breakpoints.hasOwnProperty(o) && (!1 === a.originalSettings.mobileFirst ? s < a.breakpoints[o] && (n = a.breakpoints[o]) : s > a.breakpoints[o] && (n = a.breakpoints[o]));
			null !== n ? null !== a.activeBreakpoint ? (n !== a.activeBreakpoint || i) && (a.activeBreakpoint = n, "unslick" === a.breakpointSettings[n] ? a.unslick(n) : (a.options = e.extend({}, a.originalSettings, a.breakpointSettings[n]), !0 === t && (a.currentSlide = a.options.initialSlide), a.refresh(t)), d = n) : (a.activeBreakpoint = n, "unslick" === a.breakpointSettings[n] ? a.unslick(n) : (a.options = e.extend({}, a.originalSettings, a.breakpointSettings[n]), !0 === t && (a.currentSlide = a.options.initialSlide), a.refresh(t)), d = n) : null !== a.activeBreakpoint && (a.activeBreakpoint = null, a.options = a.originalSettings, !0 === t && (a.currentSlide = a.options.initialSlide), a.refresh(t), d = n), t || !1 === d || a.$slider.trigger("breakpoint", [a, d])
		}
	}, t.prototype.changeSlide = function(t, i) {
		var o, n, s = this,
			a = e(t.currentTarget);
		switch (a.is("a") && t.preventDefault(), a.is("li") || (a = a.closest("li")), o = s.slideCount % s.options.slidesToScroll != 0 ? 0 : (s.slideCount - s.currentSlide) % s.options.slidesToScroll, t.data.message) {
			case "previous":
				n = 0 === o ? s.options.slidesToScroll : s.options.slidesToShow - o, s.slideCount > s.options.slidesToShow && s.slideHandler(s.currentSlide - n, !1, i);
				break;
			case "next":
				n = 0 === o ? s.options.slidesToScroll : o, s.slideCount > s.options.slidesToShow && s.slideHandler(s.currentSlide + n, !1, i);
				break;
			case "index":
				var d = 0 === t.data.index ? 0 : t.data.index || a.index() * s.options.slidesToScroll;
				s.slideHandler(s.checkNavigable(d), !1, i), a.children().trigger("focus");
				break;
			default:
				return
		}
	}, t.prototype.checkNavigable = function(e) {
		var t, i;
		if (i = 0, e > (t = this.getNavigableIndexes())[t.length - 1]) e = t[t.length - 1];
		else
			for (var o in t) {
				if (e < t[o]) {
					e = i;
					break
				}
				i = t[o]
			}
		return e
	}, t.prototype.cleanUpEvents = function() {
		var t = this;
		t.options.dots && null !== t.$dots && (e("li", t.$dots).off("click.slick", t.changeSlide).off("mouseenter.slick", e.proxy(t.interrupt, t, !0)).off("mouseleave.slick", e.proxy(t.interrupt, t, !1)), !0 === t.options.accessibility && t.$dots.off("keydown.slick", t.keyHandler)), t.$slider.off("focus.slick blur.slick"), !0 === t.options.arrows && t.slideCount > t.options.slidesToShow && (t.$prevArrow && t.$prevArrow.off("click.slick", t.changeSlide), t.$nextArrow && t.$nextArrow.off("click.slick", t.changeSlide), !0 === t.options.accessibility && (t.$prevArrow && t.$prevArrow.off("keydown.slick", t.keyHandler), t.$nextArrow && t.$nextArrow.off("keydown.slick", t.keyHandler))), t.$list.off("touchstart.slick mousedown.slick", t.swipeHandler), t.$list.off("touchmove.slick mousemove.slick", t.swipeHandler), t.$list.off("touchend.slick mouseup.slick", t.swipeHandler), t.$list.off("touchcancel.slick mouseleave.slick", t.swipeHandler), t.$list.off("click.slick", t.clickHandler), e(document).off(t.visibilityChange, t.visibility), t.cleanUpSlideEvents(), !0 === t.options.accessibility && t.$list.off("keydown.slick", t.keyHandler), !0 === t.options.focusOnSelect && e(t.$slideTrack).children().off("click.slick", t.selectHandler), e(window).off("orientationchange.slick.slick-" + t.instanceUid, t.orientationChange), e(window).off("resize.slick.slick-" + t.instanceUid, t.resize), e("[draggable!=true]", t.$slideTrack).off("dragstart", t.preventDefault), e(window).off("load.slick.slick-" + t.instanceUid, t.setPosition)
	}, t.prototype.cleanUpSlideEvents = function() {
		var t = this;
		t.$list.off("mouseenter.slick", e.proxy(t.interrupt, t, !0)), t.$list.off("mouseleave.slick", e.proxy(t.interrupt, t, !1))
	}, t.prototype.cleanUpRows = function() {
		var e, t = this;
		t.options.rows > 1 && ((e = t.$slides.children().children()).removeAttr("style"), t.$slider.empty().append(e))
	}, t.prototype.clickHandler = function(e) {
		!1 === this.shouldClick && (e.stopImmediatePropagation(), e.stopPropagation(), e.preventDefault())
	}, t.prototype.destroy = function(t) {
		var i = this;
		i.autoPlayClear(), i.touchObject = {}, i.cleanUpEvents(), e(".slick-cloned", i.$slider).detach(), i.$dots && i.$dots.remove(), i.$prevArrow && i.$prevArrow.length && (i.$prevArrow.removeClass("slick-disabled slick-arrow slick-hidden").removeAttr("aria-hidden aria-disabled tabindex").css("display", ""), i.htmlExpr.test(i.options.prevArrow) && i.$prevArrow.remove()), i.$nextArrow && i.$nextArrow.length && (i.$nextArrow.removeClass("slick-disabled slick-arrow slick-hidden").removeAttr("aria-hidden aria-disabled tabindex").css("display", ""), i.htmlExpr.test(i.options.nextArrow) && i.$nextArrow.remove()), i.$slides && (i.$slides.removeClass("slick-slide slick-active slick-center slick-visible slick-current").removeAttr("aria-hidden").removeAttr("data-slick-index").each((function() {
			e(this).attr("style", e(this).data("originalStyling"))
		})), i.$slideTrack.children(this.options.slide).detach(), i.$slideTrack.detach(), i.$list.detach(), i.$slider.append(i.$slides)), i.cleanUpRows(), i.$slider.removeClass("slick-slider"), i.$slider.removeClass("slick-initialized"), i.$slider.removeClass("slick-dotted"), i.unslicked = !0, t || i.$slider.trigger("destroy", [i])
	}, t.prototype.disableTransition = function(e) {
		var t = this,
			i = {};
		i[t.transitionType] = "", !1 === t.options.fade ? t.$slideTrack.css(i) : t.$slides.eq(e).css(i)
	}, t.prototype.fadeSlide = function(e, t) {
		var i = this;
		!1 === i.cssTransitions ? (i.$slides.eq(e).css({
			zIndex: i.options.zIndex
		}), i.$slides.eq(e).animate({
			opacity: 1
		}, i.options.speed, i.options.easing, t)) : (i.applyTransition(e), i.$slides.eq(e).css({
			opacity: 1,
			zIndex: i.options.zIndex
		}), t && setTimeout((function() {
			i.disableTransition(e), t.call()
		}), i.options.speed))
	}, t.prototype.fadeSlideOut = function(e) {
		var t = this;
		!1 === t.cssTransitions ? t.$slides.eq(e).animate({
			opacity: 0,
			zIndex: t.options.zIndex - 2
		}, t.options.speed, t.options.easing) : (t.applyTransition(e), t.$slides.eq(e).css({
			opacity: 0,
			zIndex: t.options.zIndex - 2
		}))
	}, t.prototype.filterSlides = t.prototype.slickFilter = function(e) {
		var t = this;
		null !== e && (t.$slidesCache = t.$slides, t.unload(), t.$slideTrack.children(this.options.slide).detach(), t.$slidesCache.filter(e).appendTo(t.$slideTrack), t.reinit())
	}, t.prototype.focusHandler = function() {
		var t = this;
		t.$slider.off("focus.slick blur.slick").on("focus.slick blur.slick", "*", (function(i) {
			i.stopImmediatePropagation();
			var o = e(this);
			setTimeout((function() {
				t.options.pauseOnFocus && (t.focussed = o.is(":focus"), t.autoPlay())
			}), 0)
		}))
	}, t.prototype.getCurrent = t.prototype.slickCurrentSlide = function() {
		return this.currentSlide
	}, t.prototype.getDotCount = function() {
		var e = this,
			t = 0,
			i = 0,
			o = 0;
		if (!0 === e.options.infinite)
			if (e.slideCount <= e.options.slidesToShow) ++o;
			else
				for (; t < e.slideCount;) ++o, t = i + e.options.slidesToScroll, i += e.options.slidesToScroll <= e.options.slidesToShow ? e.options.slidesToScroll : e.options.slidesToShow;
		else if (!0 === e.options.centerMode) o = e.slideCount;
		else if (e.options.asNavFor)
			for (; t < e.slideCount;) ++o, t = i + e.options.slidesToScroll, i += e.options.slidesToScroll <= e.options.slidesToShow ? e.options.slidesToScroll : e.options.slidesToShow;
		else o = 1 + Math.ceil((e.slideCount - e.options.slidesToShow) / e.options.slidesToScroll);
		return o - 1
	}, t.prototype.getLeft = function(e) {
		var t, i, o, n, s = this,
			a = 0;
		return s.slideOffset = 0, i = s.$slides.first().outerHeight(!0), !0 === s.options.infinite ? (s.slideCount > s.options.slidesToShow && (s.slideOffset = s.slideWidth * s.options.slidesToShow * -1, n = -1, !0 === s.options.vertical && !0 === s.options.centerMode && (2 === s.options.slidesToShow ? n = -1.5 : 1 === s.options.slidesToShow && (n = -2)), a = i * s.options.slidesToShow * n), s.slideCount % s.options.slidesToScroll != 0 && e + s.options.slidesToScroll > s.slideCount && s.slideCount > s.options.slidesToShow && (e > s.slideCount ? (s.slideOffset = (s.options.slidesToShow - (e - s.slideCount)) * s.slideWidth * -1, a = (s.options.slidesToShow - (e - s.slideCount)) * i * -1) : (s.slideOffset = s.slideCount % s.options.slidesToScroll * s.slideWidth * -1, a = s.slideCount % s.options.slidesToScroll * i * -1))) : e + s.options.slidesToShow > s.slideCount && (s.slideOffset = (e + s.options.slidesToShow - s.slideCount) * s.slideWidth, a = (e + s.options.slidesToShow - s.slideCount) * i), s.slideCount <= s.options.slidesToShow && (s.slideOffset = 0, a = 0), !0 === s.options.centerMode && s.slideCount <= s.options.slidesToShow ? s.slideOffset = s.slideWidth * Math.floor(s.options.slidesToShow) / 2 - s.slideWidth * s.slideCount / 2 : !0 === s.options.centerMode && !0 === s.options.infinite ? s.slideOffset += s.slideWidth * Math.floor(s.options.slidesToShow / 2) - s.slideWidth : !0 === s.options.centerMode && (s.slideOffset = 0, s.slideOffset += s.slideWidth * Math.floor(s.options.slidesToShow / 2)), t = !1 === s.options.vertical ? e * s.slideWidth * -1 + s.slideOffset : e * i * -1 + a, !0 === s.options.variableWidth && (o = s.slideCount <= s.options.slidesToShow || !1 === s.options.infinite ? s.$slideTrack.children(".slick-slide").eq(e) : s.$slideTrack.children(".slick-slide").eq(e + s.options.slidesToShow), t = !0 === s.options.rtl ? o[0] ? -1 * (s.$slideTrack.width() - o[0].offsetLeft - o.width()) : 0 : o[0] ? -1 * o[0].offsetLeft : 0, !0 === s.options.centerMode && (o = s.slideCount <= s.options.slidesToShow || !1 === s.options.infinite ? s.$slideTrack.children(".slick-slide").eq(e) : s.$slideTrack.children(".slick-slide").eq(e + s.options.slidesToShow + 1), t = !0 === s.options.rtl ? o[0] ? -1 * (s.$slideTrack.width() - o[0].offsetLeft - o.width()) : 0 : o[0] ? -1 * o[0].offsetLeft : 0, t += (s.$list.width() - o.outerWidth()) / 2)), t
	}, t.prototype.getOption = t.prototype.slickGetOption = function(e) {
		return this.options[e]
	}, t.prototype.getNavigableIndexes = function() {
		var e, t = this,
			i = 0,
			o = 0,
			n = [];
		for (!1 === t.options.infinite ? e = t.slideCount : (i = -1 * t.options.slidesToScroll, o = -1 * t.options.slidesToScroll, e = 2 * t.slideCount); i < e;) n.push(i), i = o + t.options.slidesToScroll, o += t.options.slidesToScroll <= t.options.slidesToShow ? t.options.slidesToScroll : t.options.slidesToShow;
		return n
	}, t.prototype.getSlick = function() {
		return this
	}, t.prototype.getSlideCount = function() {
		var t, i, o = this;
		return i = !0 === o.options.centerMode ? o.slideWidth * Math.floor(o.options.slidesToShow / 2) : 0, !0 === o.options.swipeToSlide ? (o.$slideTrack.find(".slick-slide").each((function(n, s) {
			if (s.offsetLeft - i + e(s).outerWidth() / 2 > -1 * o.swipeLeft) return t = s, !1
		})), Math.abs(e(t).attr("data-slick-index") - o.currentSlide) || 1) : o.options.slidesToScroll
	}, t.prototype.goTo = t.prototype.slickGoTo = function(e, t) {
		this.changeSlide({
			data: {
				message: "index",
				index: parseInt(e)
			}
		}, t)
	}, t.prototype.init = function(t) {
		var i = this;
		e(i.$slider).hasClass("slick-initialized") || (e(i.$slider).addClass("slick-initialized"), i.buildRows(), i.buildOut(), i.setProps(), i.startLoad(), i.loadSlider(), i.initializeEvents(), i.updateArrows(), i.updateDots(), i.checkResponsive(!0), i.focusHandler()), t && i.$slider.trigger("init", [i]), !0 === i.options.accessibility && i.initADA(), i.options.autoplay && (i.paused = !1, i.autoPlay())
	}, t.prototype.initADA = function() {
		var t = this,
			i = Math.ceil(t.slideCount / t.options.slidesToShow),
			o = t.getNavigableIndexes().filter((function(e) {
				return e >= 0 && e < t.slideCount
			}));
		t.$slides.add(t.$slideTrack.find(".slick-cloned")).attr({
			"aria-hidden": "true",
			tabindex: "-1"
		}).find("a, input, button, select").attr({
			tabindex: "-1"
		}), null !== t.$dots && (t.$slides.not(t.$slideTrack.find(".slick-cloned")).each((function(i) {
			var n = o.indexOf(i);
			e(this).attr({
				role: "tabpanel",
				id: "slick-slide" + t.instanceUid + i,
				tabindex: -1
			}), -1 !== n && e(this).attr({
				"aria-describedby": "slick-slide-control" + t.instanceUid + n
			})
		})), t.$dots.attr("role", "tablist").find("li").each((function(n) {
			var s = o[n];
			e(this).attr({
				role: "presentation"
			}), e(this).find("button").first().attr({
				role: "tab",
				id: "slick-slide-control" + t.instanceUid + n,
				"aria-controls": "slick-slide" + t.instanceUid + s,
				"aria-label": n + 1 + " of " + i,
				"aria-selected": null,
				tabindex: "-1"
			})
		})).eq(t.currentSlide).find("button").attr({
			"aria-selected": "true",
			tabindex: "0"
		}).end());
		for (var n = t.currentSlide, s = n + t.options.slidesToShow; n < s; n++) t.$slides.eq(n).attr("tabindex", 0);
		t.activateADA()
	}, t.prototype.initArrowEvents = function() {
		var e = this;
		!0 === e.options.arrows && e.slideCount > e.options.slidesToShow && (e.$prevArrow.off("click.slick").on("click.slick", {
			message: "previous"
		}, e.changeSlide), e.$nextArrow.off("click.slick").on("click.slick", {
			message: "next"
		}, e.changeSlide), !0 === e.options.accessibility && (e.$prevArrow.on("keydown.slick", e.keyHandler), e.$nextArrow.on("keydown.slick", e.keyHandler)))
	}, t.prototype.initDotEvents = function() {
		var t = this;
		!0 === t.options.dots && (e("li", t.$dots).on("click.slick", {
			message: "index"
		}, t.changeSlide), !0 === t.options.accessibility && t.$dots.on("keydown.slick", t.keyHandler)), !0 === t.options.dots && !0 === t.options.pauseOnDotsHover && e("li", t.$dots).on("mouseenter.slick", e.proxy(t.interrupt, t, !0)).on("mouseleave.slick", e.proxy(t.interrupt, t, !1))
	}, t.prototype.initSlideEvents = function() {
		var t = this;
		t.options.pauseOnHover && (t.$list.on("mouseenter.slick", e.proxy(t.interrupt, t, !0)), t.$list.on("mouseleave.slick", e.proxy(t.interrupt, t, !1)))
	}, t.prototype.initializeEvents = function() {
		var t = this;
		t.initArrowEvents(), t.initDotEvents(), t.initSlideEvents(), t.$list.on("touchstart.slick mousedown.slick", {
			action: "start"
		}, t.swipeHandler), t.$list.on("touchmove.slick mousemove.slick", {
			action: "move"
		}, t.swipeHandler), t.$list.on("touchend.slick mouseup.slick", {
			action: "end"
		}, t.swipeHandler), t.$list.on("touchcancel.slick mouseleave.slick", {
			action: "end"
		}, t.swipeHandler), t.$list.on("click.slick", t.clickHandler), e(document).on(t.visibilityChange, e.proxy(t.visibility, t)), !0 === t.options.accessibility && t.$list.on("keydown.slick", t.keyHandler), !0 === t.options.focusOnSelect && e(t.$slideTrack).children().on("click.slick", t.selectHandler), e(window).on("orientationchange.slick.slick-" + t.instanceUid, e.proxy(t.orientationChange, t)), e(window).on("resize.slick.slick-" + t.instanceUid, e.proxy(t.resize, t)), e("[draggable!=true]", t.$slideTrack).on("dragstart", t.preventDefault), e(window).on("load.slick.slick-" + t.instanceUid, t.setPosition), e(t.setPosition)
	}, t.prototype.initUI = function() {
		var e = this;
		!0 === e.options.arrows && e.slideCount > e.options.slidesToShow && (e.$prevArrow.show(), e.$nextArrow.show()), !0 === e.options.dots && e.slideCount > e.options.slidesToShow && e.$dots.show()
	}, t.prototype.keyHandler = function(e) {
		var t = this;
		e.target.tagName.match("TEXTAREA|INPUT|SELECT") || (37 === e.keyCode && !0 === t.options.accessibility ? t.changeSlide({
			data: {
				message: !0 === t.options.rtl ? "next" : "previous"
			}
		}) : 39 === e.keyCode && !0 === t.options.accessibility && t.changeSlide({
			data: {
				message: !0 === t.options.rtl ? "previous" : "next"
			}
		}))
	}, t.prototype.lazyLoad = function() {
		function t(t) {
			e("img[data-lazy]", t).each((function() {
				var t = e(this),
					i = e(this).attr("data-lazy"),
					o = e(this).attr("data-srcset"),
					n = e(this).attr("data-sizes") || s.$slider.attr("data-sizes"),
					a = document.createElement("img");
				a.onload = function() {
					t.animate({
						opacity: 0
					}, 100, (function() {
						o && (t.attr("srcset", o), n && t.attr("sizes", n)), t.attr("src", i).animate({
							opacity: 1
						}, 200, (function() {
							t.removeAttr("data-lazy data-srcset data-sizes").removeClass("slick-loading")
						})), s.$slider.trigger("lazyLoaded", [s, t, i])
					}))
				}, a.onerror = function() {
					t.removeAttr("data-lazy").removeClass("slick-loading").addClass("slick-lazyload-error"), s.$slider.trigger("lazyLoadError", [s, t, i])
				}, a.src = i
			}))
		}
		var i, o, n, s = this;
		if (!0 === s.options.centerMode ? !0 === s.options.infinite ? n = (o = s.currentSlide + (s.options.slidesToShow / 2 + 1)) + s.options.slidesToShow + 2 : (o = Math.max(0, s.currentSlide - (s.options.slidesToShow / 2 + 1)), n = s.options.slidesToShow / 2 + 1 + 2 + s.currentSlide) : (o = s.options.infinite ? s.options.slidesToShow + s.currentSlide : s.currentSlide, n = Math.ceil(o + s.options.slidesToShow), !0 === s.options.fade && (o > 0 && o--, n <= s.slideCount && n++)), i = s.$slider.find(".slick-slide").slice(o, n), "anticipated" === s.options.lazyLoad)
			for (var a = o - 1, d = n, l = s.$slider.find(".slick-slide"), r = 0; r < s.options.slidesToScroll; r++) a < 0 && (a = s.slideCount - 1), i = (i = i.add(l.eq(a))).add(l.eq(d)), a--, d++;
		t(i), s.slideCount <= s.options.slidesToShow ? t(s.$slider.find(".slick-slide")) : s.currentSlide >= s.slideCount - s.options.slidesToShow ? t(s.$slider.find(".slick-cloned").slice(0, s.options.slidesToShow)) : 0 === s.currentSlide && t(s.$slider.find(".slick-cloned").slice(-1 * s.options.slidesToShow))
	}, t.prototype.loadSlider = function() {
		var e = this;
		e.setPosition(), e.$slideTrack.css({
			opacity: 1
		}), e.$slider.removeClass("slick-loading"), e.initUI(), "progressive" === e.options.lazyLoad && e.progressiveLazyLoad()
	}, t.prototype.next = t.prototype.slickNext = function() {
		this.changeSlide({
			data: {
				message: "next"
			}
		})
	}, t.prototype.orientationChange = function() {
		this.checkResponsive(), this.setPosition()
	}, t.prototype.pause = t.prototype.slickPause = function() {
		this.autoPlayClear(), this.paused = !0
	}, t.prototype.play = t.prototype.slickPlay = function() {
		var e = this;
		e.autoPlay(), e.options.autoplay = !0, e.paused = !1, e.focussed = !1, e.interrupted = !1
	}, t.prototype.postSlide = function(t) {
		var i = this;
		i.unslicked || (i.$slider.trigger("afterChange", [i, t]), i.animating = !1, i.slideCount > i.options.slidesToShow && i.setPosition(), i.swipeLeft = null, i.options.autoplay && i.autoPlay(), !0 === i.options.accessibility && (i.initADA(), i.options.focusOnChange && e(i.$slides.get(i.currentSlide)).attr("tabindex", 0).focus()))
	}, t.prototype.prev = t.prototype.slickPrev = function() {
		this.changeSlide({
			data: {
				message: "previous"
			}
		})
	}, t.prototype.preventDefault = function(e) {
		e.preventDefault()
	}, t.prototype.progressiveLazyLoad = function(t) {
		t = t || 1;
		var i, o, n, s, a, d = this,
			l = e("img[data-lazy]", d.$slider);
		l.length ? (i = l.first(), o = i.attr("data-lazy"), n = i.attr("data-srcset"), s = i.attr("data-sizes") || d.$slider.attr("data-sizes"), (a = document.createElement("img")).onload = function() {
			n && (i.attr("srcset", n), s && i.attr("sizes", s)), i.attr("src", o).removeAttr("data-lazy data-srcset data-sizes").removeClass("slick-loading"), !0 === d.options.adaptiveHeight && d.setPosition(), d.$slider.trigger("lazyLoaded", [d, i, o]), d.progressiveLazyLoad()
		}, a.onerror = function() {
			t < 3 ? setTimeout((function() {
				d.progressiveLazyLoad(t + 1)
			}), 500) : (i.removeAttr("data-lazy").removeClass("slick-loading").addClass("slick-lazyload-error"), d.$slider.trigger("lazyLoadError", [d, i, o]), d.progressiveLazyLoad())
		}, a.src = o) : d.$slider.trigger("allImagesLoaded", [d])
	}, t.prototype.refresh = function(t) {
		var i, o, n = this;
		o = n.slideCount - n.options.slidesToShow, !n.options.infinite && n.currentSlide > o && (n.currentSlide = o), n.slideCount <= n.options.slidesToShow && (n.currentSlide = 0), i = n.currentSlide, n.destroy(!0), e.extend(n, n.initials, {
			currentSlide: i
		}), n.init(), t || n.changeSlide({
			data: {
				message: "index",
				index: i
			}
		}, !1)
	}, t.prototype.registerBreakpoints = function() {
		var t, i, o, n = this,
			s = n.options.responsive || null;
		if ("array" === e.type(s) && s.length) {
			for (t in n.respondTo = n.options.respondTo || "window", s)
				if (o = n.breakpoints.length - 1, s.hasOwnProperty(t)) {
					for (i = s[t].breakpoint; o >= 0;) n.breakpoints[o] && n.breakpoints[o] === i && n.breakpoints.splice(o, 1), o--;
					n.breakpoints.push(i), n.breakpointSettings[i] = s[t].settings
				} n.breakpoints.sort((function(e, t) {
				return n.options.mobileFirst ? e - t : t - e
			}))
		}
	}, t.prototype.reinit = function() {
		var t = this;
		t.$slides = t.$slideTrack.children(t.options.slide).addClass("slick-slide"), t.slideCount = t.$slides.length, t.currentSlide >= t.slideCount && 0 !== t.currentSlide && (t.currentSlide = t.currentSlide - t.options.slidesToScroll), t.slideCount <= t.options.slidesToShow && (t.currentSlide = 0), t.registerBreakpoints(), t.setProps(), t.setupInfinite(), t.buildArrows(), t.updateArrows(), t.initArrowEvents(), t.buildDots(), t.updateDots(), t.initDotEvents(), t.cleanUpSlideEvents(), t.initSlideEvents(), t.checkResponsive(!1, !0), !0 === t.options.focusOnSelect && e(t.$slideTrack).children().on("click.slick", t.selectHandler), t.setSlideClasses("number" == typeof t.currentSlide ? t.currentSlide : 0), t.setPosition(), t.focusHandler(), t.paused = !t.options.autoplay, t.autoPlay(), t.$slider.trigger("reInit", [t])
	}, t.prototype.resize = function() {
		var t = this;
		e(window).width() !== t.windowWidth && (clearTimeout(t.windowDelay), t.windowDelay = window.setTimeout((function() {
			t.windowWidth = e(window).width(), t.checkResponsive(), t.unslicked || t.setPosition()
		}), 50))
	}, t.prototype.removeSlide = t.prototype.slickRemove = function(e, t, i) {
		var o = this;
		if (e = "boolean" == typeof e ? !0 === (t = e) ? 0 : o.slideCount - 1 : !0 === t ? --e : e, o.slideCount < 1 || e < 0 || e > o.slideCount - 1) return !1;
		o.unload(), !0 === i ? o.$slideTrack.children().remove() : o.$slideTrack.children(this.options.slide).eq(e).remove(), o.$slides = o.$slideTrack.children(this.options.slide), o.$slideTrack.children(this.options.slide).detach(), o.$slideTrack.append(o.$slides), o.$slidesCache = o.$slides, o.reinit()
	}, t.prototype.setCSS = function(e) {
		var t, i, o = this,
			n = {};
		!0 === o.options.rtl && (e = -e), t = "left" == o.positionProp ? Math.ceil(e) + "px" : "0px", i = "top" == o.positionProp ? Math.ceil(e) + "px" : "0px", n[o.positionProp] = e, !1 === o.transformsEnabled ? o.$slideTrack.css(n) : (n = {}, !1 === o.cssTransitions ? (n[o.animType] = "translate(" + t + ", " + i + ")", o.$slideTrack.css(n)) : (n[o.animType] = "translate3d(" + t + ", " + i + ", 0px)", o.$slideTrack.css(n)))
	}, t.prototype.setDimensions = function() {
		var e = this;
		!1 === e.options.vertical ? !0 === e.options.centerMode && e.$list.css({
			padding: "0px " + e.options.centerPadding
		}) : (e.$list.height(e.$slides.first().outerHeight(!0) * e.options.slidesToShow), !0 === e.options.centerMode && e.$list.css({
			padding: e.options.centerPadding + " 0px"
		})), e.listWidth = e.$list.width(), e.listHeight = e.$list.height(), !1 === e.options.vertical && !1 === e.options.variableWidth ? (e.slideWidth = Math.ceil(e.listWidth / e.options.slidesToShow), e.$slideTrack.width(Math.ceil(e.slideWidth * e.$slideTrack.children(".slick-slide").length))) : !0 === e.options.variableWidth ? e.$slideTrack.width(5e3 * e.slideCount) : (e.slideWidth = Math.ceil(e.listWidth), e.$slideTrack.height(Math.ceil(e.$slides.first().outerHeight(!0) * e.$slideTrack.children(".slick-slide").length)));
		var t = e.$slides.first().outerWidth(!0) - e.$slides.first().width();
		!1 === e.options.variableWidth && e.$slideTrack.children(".slick-slide").width(e.slideWidth - t)
	}, t.prototype.setFade = function() {
		var t, i = this;
		i.$slides.each((function(o, n) {
			t = i.slideWidth * o * -1, !0 === i.options.rtl ? e(n).css({
				position: "relative",
				right: t,
				top: 0,
				zIndex: i.options.zIndex - 2,
				opacity: 0
			}) : e(n).css({
				position: "relative",
				left: t,
				top: 0,
				zIndex: i.options.zIndex - 2,
				opacity: 0
			})
		})), i.$slides.eq(i.currentSlide).css({
			zIndex: i.options.zIndex - 1,
			opacity: 1
		})
	}, t.prototype.setHeight = function() {
		var e = this;
		if (1 === e.options.slidesToShow && !0 === e.options.adaptiveHeight && !1 === e.options.vertical) {
			var t = e.$slides.eq(e.currentSlide).outerHeight(!0);
			e.$list.css("height", t)
		}
	}, t.prototype.setOption = t.prototype.slickSetOption = function() {
		var t, i, o, n, s, a = this,
			d = !1;
		if ("object" === e.type(arguments[0]) ? (o = arguments[0], d = arguments[1], s = "multiple") : "string" === e.type(arguments[0]) && (o = arguments[0], n = arguments[1], d = arguments[2], "responsive" === arguments[0] && "array" === e.type(arguments[1]) ? s = "responsive" : void 0 !== arguments[1] && (s = "single")), "single" === s) a.options[o] = n;
		else if ("multiple" === s) e.each(o, (function(e, t) {
			a.options[e] = t
		}));
		else if ("responsive" === s)
			for (i in n)
				if ("array" !== e.type(a.options.responsive)) a.options.responsive = [n[i]];
				else {
					for (t = a.options.responsive.length - 1; t >= 0;) a.options.responsive[t].breakpoint === n[i].breakpoint && a.options.responsive.splice(t, 1), t--;
					a.options.responsive.push(n[i])
				} d && (a.unload(), a.reinit())
	}, t.prototype.setPosition = function() {
		var e = this;
		e.setDimensions(), e.setHeight(), !1 === e.options.fade ? e.setCSS(e.getLeft(e.currentSlide)) : e.setFade(), e.$slider.trigger("setPosition", [e])
	}, t.prototype.setProps = function() {
		var e = this,
			t = document.body.style;
		e.positionProp = !0 === e.options.vertical ? "top" : "left", "top" === e.positionProp ? e.$slider.addClass("slick-vertical") : e.$slider.removeClass("slick-vertical"), void 0 === t.WebkitTransition && void 0 === t.MozTransition && void 0 === t.msTransition || !0 === e.options.useCSS && (e.cssTransitions = !0), e.options.fade && ("number" == typeof e.options.zIndex ? e.options.zIndex < 3 && (e.options.zIndex = 3) : e.options.zIndex = e.defaults.zIndex), void 0 !== t.OTransform && (e.animType = "OTransform", e.transformType = "-o-transform", e.transitionType = "OTransition", void 0 === t.perspectiveProperty && void 0 === t.webkitPerspective && (e.animType = !1)), void 0 !== t.MozTransform && (e.animType = "MozTransform", e.transformType = "-moz-transform", e.transitionType = "MozTransition", void 0 === t.perspectiveProperty && void 0 === t.MozPerspective && (e.animType = !1)), void 0 !== t.webkitTransform && (e.animType = "webkitTransform", e.transformType = "-webkit-transform", e.transitionType = "webkitTransition", void 0 === t.perspectiveProperty && void 0 === t.webkitPerspective && (e.animType = !1)), void 0 !== t.msTransform && (e.animType = "msTransform", e.transformType = "-ms-transform", e.transitionType = "msTransition", void 0 === t.msTransform && (e.animType = !1)), void 0 !== t.transform && !1 !== e.animType && (e.animType = "transform", e.transformType = "transform", e.transitionType = "transition"), e.transformsEnabled = e.options.useTransform && null !== e.animType && !1 !== e.animType
	}, t.prototype.setSlideClasses = function(e) {
		var t, i, o, n, s = this;
		if (i = s.$slider.find(".slick-slide").removeClass("slick-active slick-center slick-current").attr("aria-hidden", "true"), s.$slides.eq(e).addClass("slick-current"), !0 === s.options.centerMode) {
			var a = s.options.slidesToShow % 2 == 0 ? 1 : 0;
			t = Math.floor(s.options.slidesToShow / 2), !0 === s.options.infinite && (e >= t && e <= s.slideCount - 1 - t ? s.$slides.slice(e - t + a, e + t + 1).addClass("slick-active").attr("aria-hidden", "false") : (o = s.options.slidesToShow + e, i.slice(o - t + 1 + a, o + t + 2).addClass("slick-active").attr("aria-hidden", "false")), 0 === e ? i.eq(i.length - 1 - s.options.slidesToShow).addClass("slick-center") : e === s.slideCount - 1 && i.eq(s.options.slidesToShow).addClass("slick-center")), s.$slides.eq(e).addClass("slick-center")
		} else e >= 0 && e <= s.slideCount - s.options.slidesToShow ? s.$slides.slice(e, e + s.options.slidesToShow).addClass("slick-active").attr("aria-hidden", "false") : i.length <= s.options.slidesToShow ? i.addClass("slick-active").attr("aria-hidden", "false") : (n = s.slideCount % s.options.slidesToShow, o = !0 === s.options.infinite ? s.options.slidesToShow + e : e, s.options.slidesToShow == s.options.slidesToScroll && s.slideCount - e < s.options.slidesToShow ? i.slice(o - (s.options.slidesToShow - n), o + n).addClass("slick-active").attr("aria-hidden", "false") : i.slice(o, o + s.options.slidesToShow).addClass("slick-active").attr("aria-hidden", "false"));
		"ondemand" !== s.options.lazyLoad && "anticipated" !== s.options.lazyLoad || s.lazyLoad()
	}, t.prototype.setupInfinite = function() {
		var t, i, o, n = this;
		if (!0 === n.options.fade && (n.options.centerMode = !1), !0 === n.options.infinite && !1 === n.options.fade && (i = null, n.slideCount > n.options.slidesToShow)) {
			for (o = !0 === n.options.centerMode ? n.options.slidesToShow + 1 : n.options.slidesToShow, t = n.slideCount; t > n.slideCount - o; t -= 1) i = t - 1, e(n.$slides[i]).clone(!0).attr("id", "").attr("data-slick-index", i - n.slideCount).prependTo(n.$slideTrack).addClass("slick-cloned");
			for (t = 0; t < o + n.slideCount; t += 1) i = t, e(n.$slides[i]).clone(!0).attr("id", "").attr("data-slick-index", i + n.slideCount).appendTo(n.$slideTrack).addClass("slick-cloned");
			n.$slideTrack.find(".slick-cloned").find("[id]").each((function() {
				e(this).attr("id", "")
			}))
		}
	}, t.prototype.interrupt = function(e) {
		e || this.autoPlay(), this.interrupted = e
	}, t.prototype.selectHandler = function(t) {
		var i = this,
			o = e(t.target).is(".slick-slide") ? e(t.target) : e(t.target).parents(".slick-slide"),
			n = parseInt(o.attr("data-slick-index"));
		n || (n = 0), i.slideCount <= i.options.slidesToShow ? i.slideHandler(n, !1, !0) : i.slideHandler(n)
	}, t.prototype.slideHandler = function(e, t, i) {
		var o, n, s, a, d, l = null,
			r = this;
		if (t = t || !1, !(!0 === r.animating && !0 === r.options.waitForAnimate || !0 === r.options.fade && r.currentSlide === e))
			if (!1 === t && r.asNavFor(e), o = e, l = r.getLeft(o), a = r.getLeft(r.currentSlide), r.currentLeft = null === r.swipeLeft ? a : r.swipeLeft, !1 === r.options.infinite && !1 === r.options.centerMode && (e < 0 || e > r.getDotCount() * r.options.slidesToScroll)) !1 === r.options.fade && (o = r.currentSlide, !0 !== i ? r.animateSlide(a, (function() {
				r.postSlide(o)
			})) : r.postSlide(o));
			else if (!1 === r.options.infinite && !0 === r.options.centerMode && (e < 0 || e > r.slideCount - r.options.slidesToScroll)) !1 === r.options.fade && (o = r.currentSlide, !0 !== i ? r.animateSlide(a, (function() {
			r.postSlide(o)
		})) : r.postSlide(o));
		else {
			if (r.options.autoplay && clearInterval(r.autoPlayTimer), n = o < 0 ? r.slideCount % r.options.slidesToScroll != 0 ? r.slideCount - r.slideCount % r.options.slidesToScroll : r.slideCount + o : o >= r.slideCount ? r.slideCount % r.options.slidesToScroll != 0 ? 0 : o - r.slideCount : o, r.animating = !0, r.$slider.trigger("beforeChange", [r, r.currentSlide, n]), s = r.currentSlide, r.currentSlide = n, r.setSlideClasses(r.currentSlide), r.options.asNavFor && (d = (d = r.getNavTarget()).slick("getSlick")).slideCount <= d.options.slidesToShow && d.setSlideClasses(r.currentSlide), r.updateDots(), r.updateArrows(), !0 === r.options.fade) return !0 !== i ? (r.fadeSlideOut(s), r.fadeSlide(n, (function() {
				r.postSlide(n)
			}))) : r.postSlide(n), void r.animateHeight();
			!0 !== i ? r.animateSlide(l, (function() {
				r.postSlide(n)
			})) : r.postSlide(n)
		}
	}, t.prototype.startLoad = function() {
		var e = this;
		!0 === e.options.arrows && e.slideCount > e.options.slidesToShow && (e.$prevArrow.hide(), e.$nextArrow.hide()), !0 === e.options.dots && e.slideCount > e.options.slidesToShow && e.$dots.hide(), e.$slider.addClass("slick-loading")
	}, t.prototype.swipeDirection = function() {
		var e, t, i, o, n = this;
		return e = n.touchObject.startX - n.touchObject.curX, t = n.touchObject.startY - n.touchObject.curY, i = Math.atan2(t, e), (o = Math.round(180 * i / Math.PI)) < 0 && (o = 360 - Math.abs(o)), o <= 45 && o >= 0 || o <= 360 && o >= 315 ? !1 === n.options.rtl ? "left" : "right" : o >= 135 && o <= 225 ? !1 === n.options.rtl ? "right" : "left" : !0 === n.options.verticalSwiping ? o >= 35 && o <= 135 ? "down" : "up" : "vertical"
	}, t.prototype.swipeEnd = function(e) {
		var t, i, o = this;
		if (o.dragging = !1, o.swiping = !1, o.scrolling) return o.scrolling = !1, !1;
		if (o.interrupted = !1, o.shouldClick = !(o.touchObject.swipeLength > 10), void 0 === o.touchObject.curX) return !1;
		if (!0 === o.touchObject.edgeHit && o.$slider.trigger("edge", [o, o.swipeDirection()]), o.touchObject.swipeLength >= o.touchObject.minSwipe) {
			switch (i = o.swipeDirection()) {
				case "left":
				case "down":
					t = o.options.swipeToSlide ? o.checkNavigable(o.currentSlide + o.getSlideCount()) : o.currentSlide + o.getSlideCount(), o.currentDirection = 0;
					break;
				case "right":
				case "up":
					t = o.options.swipeToSlide ? o.checkNavigable(o.currentSlide - o.getSlideCount()) : o.currentSlide - o.getSlideCount(), o.currentDirection = 1
			}
			"vertical" != i && (o.slideHandler(t), o.touchObject = {}, o.$slider.trigger("swipe", [o, i]))
		} else o.touchObject.startX !== o.touchObject.curX && (o.slideHandler(o.currentSlide), o.touchObject = {})
	}, t.prototype.swipeHandler = function(e) {
		var t = this;
		if (!(!1 === t.options.swipe || "ontouchend" in document && !1 === t.options.swipe || !1 === t.options.draggable && -1 !== e.type.indexOf("mouse"))) switch (t.touchObject.fingerCount = e.originalEvent && void 0 !== e.originalEvent.touches ? e.originalEvent.touches.length : 1, t.touchObject.minSwipe = t.listWidth / t.options.touchThreshold, !0 === t.options.verticalSwiping && (t.touchObject.minSwipe = t.listHeight / t.options.touchThreshold), e.data.action) {
			case "start":
				t.swipeStart(e);
				break;
			case "move":
				t.swipeMove(e);
				break;
			case "end":
				t.swipeEnd(e)
		}
	}, t.prototype.swipeMove = function(e) {
		var t, i, o, n, s, a, d = this;
		return s = void 0 !== e.originalEvent ? e.originalEvent.touches : null, !(!d.dragging || d.scrolling || s && 1 !== s.length) && (t = d.getLeft(d.currentSlide), d.touchObject.curX = void 0 !== s ? s[0].pageX : e.clientX, d.touchObject.curY = void 0 !== s ? s[0].pageY : e.clientY, d.touchObject.swipeLength = Math.round(Math.sqrt(Math.pow(d.touchObject.curX - d.touchObject.startX, 2))), a = Math.round(Math.sqrt(Math.pow(d.touchObject.curY - d.touchObject.startY, 2))), !d.options.verticalSwiping && !d.swiping && a > 4 ? (d.scrolling = !0, !1) : (!0 === d.options.verticalSwiping && (d.touchObject.swipeLength = a), i = d.swipeDirection(), void 0 !== e.originalEvent && d.touchObject.swipeLength > 4 && (d.swiping = !0, e.preventDefault()), n = (!1 === d.options.rtl ? 1 : -1) * (d.touchObject.curX > d.touchObject.startX ? 1 : -1), !0 === d.options.verticalSwiping && (n = d.touchObject.curY > d.touchObject.startY ? 1 : -1), o = d.touchObject.swipeLength, d.touchObject.edgeHit = !1, !1 === d.options.infinite && (0 === d.currentSlide && "right" === i || d.currentSlide >= d.getDotCount() && "left" === i) && (o = d.touchObject.swipeLength * d.options.edgeFriction, d.touchObject.edgeHit = !0), !1 === d.options.vertical ? d.swipeLeft = t + o * n : d.swipeLeft = t + o * (d.$list.height() / d.listWidth) * n, !0 === d.options.verticalSwiping && (d.swipeLeft = t + o * n), !0 !== d.options.fade && !1 !== d.options.touchMove && (!0 === d.animating ? (d.swipeLeft = null, !1) : void d.setCSS(d.swipeLeft))))
	}, t.prototype.swipeStart = function(e) {
		var t, i = this;
		if (i.interrupted = !0, 1 !== i.touchObject.fingerCount || i.slideCount <= i.options.slidesToShow) return i.touchObject = {}, !1;
		void 0 !== e.originalEvent && void 0 !== e.originalEvent.touches && (t = e.originalEvent.touches[0]), i.touchObject.startX = i.touchObject.curX = void 0 !== t ? t.pageX : e.clientX, i.touchObject.startY = i.touchObject.curY = void 0 !== t ? t.pageY : e.clientY, i.dragging = !0
	}, t.prototype.unfilterSlides = t.prototype.slickUnfilter = function() {
		var e = this;
		null !== e.$slidesCache && (e.unload(), e.$slideTrack.children(this.options.slide).detach(), e.$slidesCache.appendTo(e.$slideTrack), e.reinit())
	}, t.prototype.unload = function() {
		var t = this;
		e(".slick-cloned", t.$slider).remove(), t.$dots && t.$dots.remove(), t.$prevArrow && t.htmlExpr.test(t.options.prevArrow) && t.$prevArrow.remove(), t.$nextArrow && t.htmlExpr.test(t.options.nextArrow) && t.$nextArrow.remove(), t.$slides.removeClass("slick-slide slick-active slick-visible slick-current").attr("aria-hidden", "true").css("width", "")
	}, t.prototype.unslick = function(e) {
		var t = this;
		t.$slider.trigger("unslick", [t, e]), t.destroy()
	}, t.prototype.updateArrows = function() {
		var e = this;
		Math.floor(e.options.slidesToShow / 2), !0 === e.options.arrows && e.slideCount > e.options.slidesToShow && !e.options.infinite && (e.$prevArrow.removeClass("slick-disabled").attr("aria-disabled", "false"), e.$nextArrow.removeClass("slick-disabled").attr("aria-disabled", "false"), 0 === e.currentSlide ? (e.$prevArrow.addClass("slick-disabled").attr("aria-disabled", "true"), e.$nextArrow.removeClass("slick-disabled").attr("aria-disabled", "false")) : (e.currentSlide >= e.slideCount - e.options.slidesToShow && !1 === e.options.centerMode || e.currentSlide >= e.slideCount - 1 && !0 === e.options.centerMode) && (e.$nextArrow.addClass("slick-disabled").attr("aria-disabled", "true"), e.$prevArrow.removeClass("slick-disabled").attr("aria-disabled", "false")))
	}, t.prototype.updateDots = function() {
		var e = this;
		null !== e.$dots && (e.$dots.find("li").removeClass("slick-active").end(), e.$dots.find("li").eq(Math.floor(e.currentSlide / e.options.slidesToScroll)).addClass("slick-active"))
	}, t.prototype.visibility = function() {
		var e = this;
		e.options.autoplay && (document[e.hidden] ? e.interrupted = !0 : e.interrupted = !1)
	}, e.fn.slick = function() {
		var e, i, o = this,
			n = arguments[0],
			s = Array.prototype.slice.call(arguments, 1),
			a = o.length;
		for (e = 0; e < a; e++)
			if ("object" == typeof n || void 0 === n ? o[e].slick = new t(o[e], n) : i = o[e].slick[n].apply(o[e].slick, s), void 0 !== i) return i;
		return o
	}
})), $(".me-top-orangebar").length > 0 && allCloseFun(".ob-closebtn", ".me-top-orangebar"), $(".me-top-orangebar").length > 0 && allCloseFun(".tmb-closebtn", ".top-message-banner");
const dropdown = document.querySelector(".me-lang-btn"),
	dropdownWindow = document.querySelector(".lang-container");
if (dropdown.addEventListener("click", (e => {
		dropdownWindow.classList.toggle("dropdown__window--active")
	})), $(".lang-container .lang-item").click((function() {
		var e = $(this).attr("data-id");
		$(".me-lang-btn span").html(e), $(this).siblings().removeClass("selected"), $(this).addClass("selected")
	})), document.addEventListener("click", (e => {
		const t = e.target;
		t.classList.contains("change-text") || t.classList.contains("lang-item") || dropdownWindow.classList.remove("dropdown__window--active")
	})), $(".icard-slider-container").length > 0) {
	var icardLen = $(".icard-slider-container .icard-slider-div").length;
	if (icardLen > 5) {
		var sliderIcard = $(".icard-slider-container").slick({
			arrows: !0,
			infinite: !0,
			slidesToShow: 6,
			slidesToScroll: 1,
			nextArrow: '<button class="next-arrow"><svg width="12" height="21" viewBox="0 0 12 21" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1.28346 0.577913C0.904551 0.753695 0.732676 1.1951 0.892832 1.58963C0.935801 1.6951 2.16627 2.9451 5.35377 6.11698L9.76002 10.5037L5.35377 14.8865C2.16236 18.0662 0.935801 19.3123 0.892832 19.4178C0.861582 19.4998 0.834238 19.6365 0.834238 19.7224C0.834238 20.2849 1.40455 20.6639 1.90846 20.4295C2.13111 20.324 11.4436 11.0545 11.5413 10.8357C11.635 10.6365 11.635 10.3709 11.5413 10.1717C11.4436 9.95291 2.13111 0.683382 1.90846 0.577913C1.70924 0.484163 1.48268 0.484163 1.28346 0.577913Z" fill="#333333"/></svg></button>',
			responsive: [{
				breakpoint: 1441,
				settings: {
					slidesToShow: 4,
					slidesToScroll: 1
				}
			}, {
				breakpoint: 1025,
				settings: {
					slidesToShow: 3,
					slidesToScroll: 1
				}
			}, {
				breakpoint: 835,
				settings: {
					slidesToShow: 2,
					slidesToScroll: 1
				}
			}, {
				breakpoint: 639,
				settings: {
					slidesToShow: 1,
					slidesToScroll: 1
				}
			}]
		});
		$(".slick-prev").hide(), sliderIcard.on("afterChange", (function(e, t, i) {
			0 === i ? ($(".slick-prev").hide(), $(".slick-next").show()) : $(".slick-prev").show(), t.slideCount === i + 1 && $(".slick-next").hide()
		}))
	} else $(".icard-slider-container").addClass("less-than-six-items")
}
var countDownDate = new Date("Jun 30, 2023 15:37:25").getTime(),
	x = setInterval((function() {
		var e = (new Date).getTime(),
			t = countDownDate - e,
			i = Math.floor(t / 864e5),
			o = Math.floor(t % 864e5 / 36e5),
			n = Math.floor(t % 36e5 / 6e4),
			s = Math.floor(t % 6e4 / 1e3);
		null !== document.getElementById("day") && (document.getElementById("day").innerHTML = "<span>" + i + "</span><span>DAY</span>", document.getElementById("hours").innerHTML = "<span>" + o.toLocaleString(void 0, {
			minimumIntegerDigits: 2
		}) + "</span><span>HRS</span>", document.getElementById("mins").innerHTML = "<span>" + n.toLocaleString(void 0, {
			minimumIntegerDigits: 2
		}) + "</span><span>MINS</span>", document.getElementById("sec").innerHTML = "<span>" + s.toLocaleString(void 0, {
			minimumIntegerDigits: 2
		}) + "</span><span>SEC</span> ", t < 0 && (clearInterval(x), document.getElementById("demo").innerHTML = "EXPIRED", null !== document.getElementById("day") && (document.getElementById("day").innerHTML = "<span>00</span><span>DAY</span>", document.getElementById("hours").innerHTML = "<span>00</span><span>HRS</span>", document.getElementById("mins").innerHTML = "<span>00</span><span>MINS</span>", document.getElementById("sec").innerHTML = "<span>00</span><span>SEC</span>")))
	}), 1e3);

function recentType(e) {
	e ? $(".recent-search-type").removeClass("hidden") : $(".recent-search-type").addClass("hidden")
}

function recentHover(e) {
	e ? $(".recent-search-hover").removeClass("hidden") : $(".recent-search-hover").addClass("hidden")
}

function destroyCarousel(e) {
	e.find(".menu-slider").hasClass("slick-initialized") && e.find(".menu-slider").slick("destroy")
}

function menuSliderShow(e) {
	destroyCarousel(e), e.find(".menu-slider").not(".slick-initialized").slick({
		slidesToShow: 1,
		slidesToScroll: 1,
		autoplay: !1,
		arrows: !1,
		dots: !0,
		variableHeight: !0
	});
	var t = (100 / e.find(".menu-slider .slick-dots").length).toFixed(2);
	e.find(".slick-dots li").css({
		width: t + "%"
	})
}
$('#me-message,.message-dropdown[aria-labelledby="me-message"]').hover((function() {
	$('.message-dropdown[aria-labelledby="me-message"]').removeClass("hidden"), $(this).addClass("hover")
}), (function() {
	$(this).removeClass("hover"), $('.message-dropdown[aria-labelledby="me-message"]').addClass("hidden")
})), $('#me-fav,.message-dropdown[aria-labelledby="me-fav"]').hover((function() {
	$('.message-dropdown[aria-labelledby="me-fav"]').removeClass("hidden"), $(this).prev().find(".badge-container").addClass("show-triangle"), $(this).addClass("hover")
}), (function() {
	$(this).removeClass("hover"), $('.message-dropdown[aria-labelledby="me-fav"]').addClass("hidden"), $(this).prev().find(".badge-container").removeClass("show-triangle")
})), $('.message-dropdown[aria-labelledby="me-cart"]').hover((function() {
	$(this).prev().find(".badge-container").addClass("show-triangle")
}), (function() {
	$(this).prev().find(".badge-container").removeClass("show-triangle")
})), $(window).on("load resize", (function() {
	$(window).innerWidth() > 1e3 && $(".me-sub-menu").each((function() {
		if ($(this).children().children(".me-sub-menu-item").length > 8) $(this).children().addClass("cus-height"), $(".menu-slider img").addClass("cus-height");
		else {
			$(this).children().children(".me-sub-menu-item").length;
			$(this).children().css({
				height: "488px"
			}), $(".menu-slider img").css({
				height: "488px"
			})
		}
	}))
})), $(document).on("click", ".plus-btn", (function() {
	var e = parseInt($(this).siblings(".total-value").val()) + 1;
	$(this).siblings(".total-value").val(e), $(this).siblings(".total-value").attr("value", e)
})), $(document).on("click", ".minus-btn", (function() {
	var e = parseInt($(this).siblings(".total-value").val());
	0 != e ? e -= 1 : e = 0, 0 == e && $(this).parent().parent().parent().parent().remove(), $(this).siblings(".total-value").val(e), $(this).siblings(".total-value").attr("value", e)
})), $(".message-dropdown-item.item-invalid").each((function() {
	var e = $(this).children().find(".quantity-container .minus-btn"),
		t = $(this).children().find(".quantity-container .plus-btn"),
		i = $(this).children().find(".quantity-container .total-value");
	e.attr("disabled", !0), t.attr("disabled", !0), i.attr("disabled", !0), i.css({
		color: "#7c7c7c"
	})
})), $(".mobile-menu-burger").click((function() {
	$(".mobile-menu-list").show().css({
		left: "0"
	}), $("body").addClass("overflow-hidden")
})), $(".close-btn").click((function() {
	$(".mobile-menu-list").hide().removeAttr("style"), $("body").removeClass("overflow-hidden")
})), document.addEventListener("DOMContentLoaded", (() => {
	var e;
	if (e = !0, $(window).innerWidth() < 1e3) var t = $(".menu-with-searchbar:eq(1)").height(),
		i = $(".menu-with-searchbar:eq(1)").offset();
	else t = $(".menu-with-searchbar").height(), i = $(".menu-with-searchbar").offset();
	var o = i.top,
		n = $(".menu-only").offset().top;
	$(window).on("resize", (function() {
		$(window).innerWidth() < 1e3 ? (t = $(".menu-with-searchbar:eq(1)").height(), i = $(".menu-with-searchbar:eq(1)").offset()) : (t = $(".menu-with-searchbar").height(), i = $(".menu-with-searchbar").offset())
	})), window.addEventListener("scroll", (() => {
		if (e = !(this.oldScroll > this.scrollY), this.oldScroll = this.scrollY, e) {
			if (this.scrollY > o && $(".menu-with-searchbar").addClass("fixed-bar head-boxshadow"), this.scrollY > n && $(".menu-only").removeClass("onlyme").attr("style"), $(".compare-list-section").length > 0) {
				var i = $(".compare-list-section").offset().top + 200,
					s = $(window).scrollTop();
				this.scrollY > i && s >= i && ($(".sticky-compare-bar").css({
					position: "fixed",
					top: t + "px",
					width: "100%",
					zIndex: "1"
				}).addClass("compare-fixed head-boxshadow"), $(".menu-with-searchbar").removeClass("head-boxshadow"), stickyTargetDiv.prop("scrollTop", compareTargetDiv.scrollTop()).prop("scrollLeft", compareTargetDiv.scrollLeft()))
			}
			if ($(".me-product-detail-menu-tab").length > 0) {
				var a = $(".image-gallery").innerHeight() + 250;
				this.scrollY > a && ($(".me-product-detail-menu-tab").removeClass("hidden").css({
					position: "fixed",
					top: t + "px"
				}), $(".menu-with-searchbar").removeClass("head-boxshadow"))
			}
		} else {
			this.scrollY < o && $(".menu-with-searchbar").removeClass("fixed-bar"), this.scrollY > n && ($(".menu-only").addClass("onlyme head-boxshadow"), $(".menu-only").css({
				top: `${t}px`
			}), $(".menu-with-searchbar").removeClass("head-boxshadow")), this.scrollY < n && $(".menu-only").removeClass("onlyme head-boxshadow").attr("style");
			var d = t + $(".menu-only").height();
			if ($(".compare-list-section").length > 0) {
				i = $(".compare-list-section").offset().top + 200;
				(s = $(window).scrollTop()) >= i ? ($(".sticky-compare-bar").css({
					position: "fixed",
					top: d + "px",
					width: "100%",
					zIndex: "1"
				}).addClass("compare-fixed head-boxshadow"), $(".menu-with-searchbar").removeClass("head-boxshadow"), $(".menu-only").removeClass("head-boxshadow")) : $(".sticky-compare-bar").css({
					position: "static"
				}).removeClass("compare-fixed head-boxshadow").removeAttr("style")
			}
			if ($(".me-product-detail-menu-tab").length > 0) {
				a = $(".image-gallery").innerHeight() - 50;
				this.scrollY > a ? ($(".me-product-detail-menu-tab").removeClass("hidden").css({
					position: "fixed",
					top: d + "px"
				}), $(".menu-only").removeClass("head-boxshadow")) : $(".me-product-detail-menu-tab").addClass("hidden").removeAttr("style")
			}
		}
	}))
})), $(".ele-menu-lists li > a").click((function() {
	$(this).siblings().hasClass("mobile-dropdown-menu") && ($(this).parent().siblings().children().removeClass("active"), $(this).parent().siblings().children(".mobile-dropdown-menu").removeClass("show"), $(this).toggleClass("active"), $(this).siblings().toggleClass("show"))
})), $(".mobile-menu-list .login-container").click((function() {
	$(this).siblings(".login-dropdown").toggle()
})), $(".search-icon-container").click((function() {
	$("#search-list-container").removeClass("hidden")
})), $(".back-arrow-btn").click((function() {
	$("#search-list-container").addClass("hidden");
	recentType(false), recentHover(!0)
})), $("#search-item").on("focus", (function() {
	$(this).parent().addClass("boblue")
})), $("#search-item").on("blur", (function() {
	$(this).parent().removeClass("boblue")
})), $("#search-item.m-search-input").on("focus", (function() {
	recentType(true), recentHover(!1)
})), $("#search-item-desktop").on("click", (function() {
	$(".desktop-search").toggleClass("hidden")
})), $("#search-item-desktop").on("focus", (function() {
	$(this).parent().css({
		"border-color": "#2FA9B5"
	})
})), $("#search-item-desktop").on("blur", (function() {
	$(this).parent().removeAttr("style")
})), $(".fav-close-btn").click((function() {
	$(this).parent().parent().parent().remove()
})), document.addEventListener("click", (e => {
	const t = e.target;
	t.classList.contains("search-item-desktop") || t.classList.contains("lang-item") || $(".desktop-search").addClass("hidden")
})), $(document).on("click", ".register-btn", (function() {
	$(".lr-register-popup").addClass("flex"), $("body").addClass("overflow-hidden")
})), $(document).on("click", ".lr-popup-back", (function() {
	$(".lr-register-popup").addClass("flex"), $(".lr-login-with-email-popup").removeClass("flex"), $("body").addClass("overflow-hidden")
})), $(document).on("click", ".cart-remove-btn", (function() {
	$(this).parent().parent().remove()
}));
var hoverID = "";

function fixedCookiePopup() {
	$(window).scroll((function(e) {
		var t = $("#cookie-popup.me-footer-container").css("display"),
			i = $(".me-footer #cookie-popup").css("display");
		if ("flex" == t || "flex" == i) {
			var o = $(".me-footer").position() ? $(".me-footer").position().top : 0,
				n = ($(document).scrollTop(), $(window).height()),
				s = $(window).scrollTop();
			$(window).scrollTop();
			o <= s + n ? ($("#cookie-popup.fixed").hide(), $(".me-footer #cookie-popup").show()) : ($("#cookie-popup.fixed").show(), $(".me-footer #cookie-popup").hide())
		} else $("#cookie-popup.fixed").hide(), $(".me-footer #cookie-popup").hide()
	}))
}
if ($(".navigation li").hover((function() {
		var e = $(this).find("a").attr("id");
		$(this).find("a").addClass("active"), $(this).siblings().find("a").removeClass("active"), hoverID = e, $('.me-sub-menu[aria-labelledby="' + e + '"]').length > 0 ? ($(this).parent().next().find(".dropdown-menu").addClass("active"), $('.me-sub-menu[aria-labelledby="' + e + '"]').addClass("active"), $('.me-sub-menu[aria-labelledby="' + e + '"]').siblings().removeClass("active"), menuSliderShow($(".me-sub-menu[aria-labelledby=" + e + "]"))) : ($(".me-sub-menu").removeClass("active"), $(this).parent().next().removeClass("active"))
	}), (function() {
		$(this).find("a").removeClass("active"), $(this).parent().next().find(".dropdown-menu").removeClass("active")
	})), $(".dropdown-menu").hover((function() {
		$(this).addClass("active"), $('.me-sub-menu[aria-labelledby="' + hoverID + '"]').addClass("active"), $('.me-sub-menu[aria-labelledby="' + hoverID + '"]').siblings().removeClass("active"), hoverID && $(".navigation li #" + hoverID).addClass("active")
	}), (function() {
		$(this).removeClass("active"), hoverID && $(".navigation li #" + hoverID).removeClass("active")
	})), $(".dropdown-menu .me-sub-menu").hover((function() {
		$(this).parent().addClass("active"), $(this).addClass("active"), hoverID && $(".navigation li #" + hoverID).addClass("active")
	}), (function() {
		setTimeout((function() {
			$(this).parent().removeClass("active"), $(this).removeClass("active"), hoverID && $(".navigation li #" + hoverID).removeClass("active")
		}), 1e3), hoverID = ""
	})), $("#cookie-close").click((function() {
		console.log("click"), $("#cookie-popup").hide(), $(".me-footer #cookie-popup").hide()
	})), $(".me-footer #cookie-close").click((function() {
		console.log("click"), $("#cookie-popup").hide(), $(".me-footer #cookie-popup").hide()
	})), fixedCookiePopup(), $(".me-banner-slider-container").length > 0) {
	var $banner = $(".me-banner-slider-container"),
		count = $banner.length;
	1 == count && $banner.slick({
		arrows: !0,
		centerMode: !0,
		variableWidth: !0,
		slidesToShow: 1,
		slidesToScroll: 1,
		autoplay: !0,
		autoplaySpeed: 2e3,
		pauseOnHover: !0,
		pauseOnFocus: !0,
		prevArrow: '<button class="prev-arrow"><svg width="13" height="24" viewBox="0 0 13 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M12.4595 0.0934944C12.9141 0.304432 13.1204 0.83412 12.9282 1.30756C12.8766 1.43412 11.4001 2.93412 7.57509 6.74037L2.28759 12.0044L7.57509 17.2638C11.4048 21.0794 12.8766 22.5747 12.9282 22.7013C12.9657 22.7997 12.9985 22.9638 12.9985 23.0669C12.9985 23.7419 12.3141 24.1966 11.7095 23.9154C11.4423 23.7888 0.267275 12.6654 0.150087 12.4029C0.0375872 12.1638 0.0375872 11.8451 0.150087 11.606C0.267275 11.3435 11.4423 0.220058 11.7095 0.0934944C11.9485 -0.0190048 12.2204 -0.0190048 12.4595 0.0934944Z" fill="#333333"/></svg></button>',
		nextArrow: '<button class="next-arrow"><svg width="12" height="21" viewBox="0 0 12 21" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1.28346 0.577913C0.904551 0.753695 0.732676 1.1951 0.892832 1.58963C0.935801 1.6951 2.16627 2.9451 5.35377 6.11698L9.76002 10.5037L5.35377 14.8865C2.16236 18.0662 0.935801 19.3123 0.892832 19.4178C0.861582 19.4998 0.834238 19.6365 0.834238 19.7224C0.834238 20.2849 1.40455 20.6639 1.90846 20.4295C2.13111 20.324 11.4436 11.0545 11.5413 10.8357C11.635 10.6365 11.635 10.3709 11.5413 10.1717C11.4436 9.95291 2.13111 0.683382 1.90846 0.577913C1.70924 0.484163 1.48268 0.484163 1.28346 0.577913Z" fill="#333333"/></svg></button>'
	}), 2 == count && $banner.slick({
		arrows: !0,
		centerMode: !0,
		variableWidth: !0,
		slidesToShow: 1,
		slidesToScroll: 1,
		autoplay: !0,
		autoplaySpeed: 2e3,
		pauseOnHover: !0,
		pauseOnFocus: !0,
		prevArrow: '<button class="prev-arrow"><svg width="13" height="24" viewBox="0 0 13 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M12.4595 0.0934944C12.9141 0.304432 13.1204 0.83412 12.9282 1.30756C12.8766 1.43412 11.4001 2.93412 7.57509 6.74037L2.28759 12.0044L7.57509 17.2638C11.4048 21.0794 12.8766 22.5747 12.9282 22.7013C12.9657 22.7997 12.9985 22.9638 12.9985 23.0669C12.9985 23.7419 12.3141 24.1966 11.7095 23.9154C11.4423 23.7888 0.267275 12.6654 0.150087 12.4029C0.0375872 12.1638 0.0375872 11.8451 0.150087 11.606C0.267275 11.3435 11.4423 0.220058 11.7095 0.0934944C11.9485 -0.0190048 12.2204 -0.0190048 12.4595 0.0934944Z" fill="#333333"/></svg></button>',
		nextArrow: '<button class="next-arrow"><svg width="12" height="21" viewBox="0 0 12 21" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1.28346 0.577913C0.904551 0.753695 0.732676 1.1951 0.892832 1.58963C0.935801 1.6951 2.16627 2.9451 5.35377 6.11698L9.76002 10.5037L5.35377 14.8865C2.16236 18.0662 0.935801 19.3123 0.892832 19.4178C0.861582 19.4998 0.834238 19.6365 0.834238 19.7224C0.834238 20.2849 1.40455 20.6639 1.90846 20.4295C2.13111 20.324 11.4436 11.0545 11.5413 10.8357C11.635 10.6365 11.635 10.3709 11.5413 10.1717C11.4436 9.95291 2.13111 0.683382 1.90846 0.577913C1.70924 0.484163 1.48268 0.484163 1.28346 0.577913Z" fill="#333333"/></svg></button>'
	}), 3 == count && $banner.slick({
		arrows: !0,
		centerMode: !0,
		variableWidth: !0,
		slidesToShow: 1,
		slidesToScroll: 1,
		autoplay: !0,
		autoplaySpeed: 2e3,
		pauseOnHover: !0,
		pauseOnFocus: !0,
		prevArrow: '<button class="prev-arrow"><svg width="13" height="24" viewBox="0 0 13 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M12.4595 0.0934944C12.9141 0.304432 13.1204 0.83412 12.9282 1.30756C12.8766 1.43412 11.4001 2.93412 7.57509 6.74037L2.28759 12.0044L7.57509 17.2638C11.4048 21.0794 12.8766 22.5747 12.9282 22.7013C12.9657 22.7997 12.9985 22.9638 12.9985 23.0669C12.9985 23.7419 12.3141 24.1966 11.7095 23.9154C11.4423 23.7888 0.267275 12.6654 0.150087 12.4029C0.0375872 12.1638 0.0375872 11.8451 0.150087 11.606C0.267275 11.3435 11.4423 0.220058 11.7095 0.0934944C11.9485 -0.0190048 12.2204 -0.0190048 12.4595 0.0934944Z" fill="#333333"/></svg></button>',
		nextArrow: '<button class="next-arrow"><svg width="12" height="21" viewBox="0 0 12 21" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1.28346 0.577913C0.904551 0.753695 0.732676 1.1951 0.892832 1.58963C0.935801 1.6951 2.16627 2.9451 5.35377 6.11698L9.76002 10.5037L5.35377 14.8865C2.16236 18.0662 0.935801 19.3123 0.892832 19.4178C0.861582 19.4998 0.834238 19.6365 0.834238 19.7224C0.834238 20.2849 1.40455 20.6639 1.90846 20.4295C2.13111 20.324 11.4436 11.0545 11.5413 10.8357C11.635 10.6365 11.635 10.3709 11.5413 10.1717C11.4436 9.95291 2.13111 0.683382 1.90846 0.577913C1.70924 0.484163 1.48268 0.484163 1.28346 0.577913Z" fill="#333333"/></svg></button>'
	}), count > 4 && $banner.slick({
		arrows: !0,
		centerMode: !0,
		variableWidth: !0,
		slidesToShow: 3,
		slidesToScroll: 1,
		autoplay: !0,
		autoplaySpeed: 2e3,
		pauseOnHover: !0,
		pauseOnFocus: !0,
		prevArrow: '<button class="prev-arrow"><svg width="13" height="24" viewBox="0 0 13 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M12.4595 0.0934944C12.9141 0.304432 13.1204 0.83412 12.9282 1.30756C12.8766 1.43412 11.4001 2.93412 7.57509 6.74037L2.28759 12.0044L7.57509 17.2638C11.4048 21.0794 12.8766 22.5747 12.9282 22.7013C12.9657 22.7997 12.9985 22.9638 12.9985 23.0669C12.9985 23.7419 12.3141 24.1966 11.7095 23.9154C11.4423 23.7888 0.267275 12.6654 0.150087 12.4029C0.0375872 12.1638 0.0375872 11.8451 0.150087 11.606C0.267275 11.3435 11.4423 0.220058 11.7095 0.0934944C11.9485 -0.0190048 12.2204 -0.0190048 12.4595 0.0934944Z" fill="#333333"/></svg></button>',
		nextArrow: '<button class="next-arrow"><svg width="12" height="21" viewBox="0 0 12 21" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1.28346 0.577913C0.904551 0.753695 0.732676 1.1951 0.892832 1.58963C0.935801 1.6951 2.16627 2.9451 5.35377 6.11698L9.76002 10.5037L5.35377 14.8865C2.16236 18.0662 0.935801 19.3123 0.892832 19.4178C0.861582 19.4998 0.834238 19.6365 0.834238 19.7224C0.834238 20.2849 1.40455 20.6639 1.90846 20.4295C2.13111 20.324 11.4436 11.0545 11.5413 10.8357C11.635 10.6365 11.635 10.3709 11.5413 10.1717C11.4436 9.95291 2.13111 0.683382 1.90846 0.577913C1.70924 0.484163 1.48268 0.484163 1.28346 0.577913Z" fill="#333333"/></svg></button>'
	})
}

function meMedicalMainSlider() {
	var e = $(".me-medical-main");
	e.slick({
		slidesToShow: 1,
		slidesToScroll: 1,
		autoplay: !1,
		arrows: !0,
		variableWidth: !0,
		variableHeight: !0,
		prevArrow: '<button type="button" class="m2m-prev-arrow"><svg width="12" height="21" viewBox="0 0 12 21" fill="none" xmlns="http://www.w3.org/2000/svg" class="rotate-180"><path d="M1.28346 0.577913C0.904551 0.753695 0.732676 1.1951 0.892832 1.58963C0.935801 1.6951 2.16627 2.9451 5.35377 6.11698L9.76002 10.5037L5.35377 14.8865C2.16236 18.0662 0.935801 19.3123 0.892832 19.4178C0.861582 19.4998 0.834238 19.6365 0.834238 19.7224C0.834238 20.2849 1.40455 20.6639 1.90846 20.4295C2.13111 20.324 11.4436 11.0545 11.5413 10.8357C11.635 10.6365 11.635 10.3709 11.5413 10.1717C11.4436 9.95291 2.13111 0.683382 1.90846 0.577913C1.70924 0.484163 1.48268 0.484163 1.28346 0.577913Z" fill="#333333"/></svg></button>',
		nextArrow: '<button class="m2m-next-arrow"><svg width="12" height="21" viewBox="0 0 12 21" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1.28346 0.577913C0.904551 0.753695 0.732676 1.1951 0.892832 1.58963C0.935801 1.6951 2.16627 2.9451 5.35377 6.11698L9.76002 10.5037L5.35377 14.8865C2.16236 18.0662 0.935801 19.3123 0.892832 19.4178C0.861582 19.4998 0.834238 19.6365 0.834238 19.7224C0.834238 20.2849 1.40455 20.6639 1.90846 20.4295C2.13111 20.324 11.4436 11.0545 11.5413 10.8357C11.635 10.6365 11.635 10.3709 11.5413 10.1717C11.4436 9.95291 2.13111 0.683382 1.90846 0.577913C1.70924 0.484163 1.48268 0.484163 1.28346 0.577913Z" fill="#333333"/></svg></button>',
		responsive: [{
			breakpoint: 571,
			settings: {
				slidesToShow: 1,
				slidesToScroll: 1,
				variableWidth: !1
			}
		}]
	}), e.on("afterChange", (function(e, t, i) {
		$(".me-medical-sub > img").removeClass("active_img"), $('.me-medical-sub > img[data-id="' + i + '"]').addClass("active_img")
	}))
}

function checkPreviewHeight(e) {
	$(window).innerWidth() < 1025 && ($(window).innerHeight() <= e ? $(".preview-popup-box .modal-content .status-corner").css({
		height: "320px",
		"overflow-y": "auto"
	}) : $(".preview-popup-box .modal-content .status-corner").removeAttr("style"))
}

function closePreviewModal(e) {
	$("#" + e).addClass("hidden"), $("body").removeClass("overflow-hidden"), $(".me-medical-main").slick("unslick"), $("#" + e + " .modal-content .status-corner").removeAttr("style")
}
if ($(".cupon-pop-close-btn").click((function() {
		var e = $(this).parent().attr("id");
		$("#" + e).hide()
	})), $(".simple-close").click((function() {
		$(this).parent().hide()
	})), $(".coupon-open-btn").click((function() {
		var e = $(this).data("target");
		$(".me-cupon-popup").css({
			"z-index": "100"
		}), $(e).removeClass("hidden"), $("body").addClass("overflow-hidden")
	})), $(".sample-close-btn").click((function() {
		var e = $(this).data("dismiss");
		$(e).addClass("hidden"), $("body").removeClass("overflow-hidden"), $(".me-cupon-popup").removeAttr("style")
	})), $(document).on("click", (function(e) {
		var t = e.target.id;
		"sampleCopy" === t.slice(0, 10) && ($("#" + t).addClass("hidden"), $("body").removeClass("overflow-hidden"), $(".me-cupon-popup").removeAttr("style"))
	})), $(window).scroll((function() {
		var e = $(".me-banner-slider").height();
		document.documentElement.scrollTop > e ? $(".me-cupon-popup").removeClass("hidden") : $(".me-cupon-popup").addClass("hidden")
	})), jQuery((() => {
		$(".leaderboard-card").slick({
			slidesToShow: 2,
			slidesToScroll: 1,
			autoplay: !1,
			arrows: !0,
			prevArrow: '<button type="button" class="prev-arrow"><svg width="12" height="21" viewBox="0 0 12 21" fill="none" xmlns="http://www.w3.org/2000/svg" class="rotate-180"><path d="M1.28346 0.577913C0.904551 0.753695 0.732676 1.1951 0.892832 1.58963C0.935801 1.6951 2.16627 2.9451 5.35377 6.11698L9.76002 10.5037L5.35377 14.8865C2.16236 18.0662 0.935801 19.3123 0.892832 19.4178C0.861582 19.4998 0.834238 19.6365 0.834238 19.7224C0.834238 20.2849 1.40455 20.6639 1.90846 20.4295C2.13111 20.324 11.4436 11.0545 11.5413 10.8357C11.635 10.6365 11.635 10.3709 11.5413 10.1717C11.4436 9.95291 2.13111 0.683382 1.90846 0.577913C1.70924 0.484163 1.48268 0.484163 1.28346 0.577913Z" fill="#333333"/></svg></button>',
			nextArrow: '<button class="next-arrow"><svg width="12" height="21" viewBox="0 0 12 21" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1.28346 0.577913C0.904551 0.753695 0.732676 1.1951 0.892832 1.58963C0.935801 1.6951 2.16627 2.9451 5.35377 6.11698L9.76002 10.5037L5.35377 14.8865C2.16236 18.0662 0.935801 19.3123 0.892832 19.4178C0.861582 19.4998 0.834238 19.6365 0.834238 19.7224C0.834238 20.2849 1.40455 20.6639 1.90846 20.4295C2.13111 20.324 11.4436 11.0545 11.5413 10.8357C11.635 10.6365 11.635 10.3709 11.5413 10.1717C11.4436 9.95291 2.13111 0.683382 1.90846 0.577913C1.70924 0.484163 1.48268 0.484163 1.28346 0.577913Z" fill="#333333"/></svg></button>',
			responsive: [{
				breakpoint: 1e3,
				settings: {
					slidesToShow: 1,
					slidesToScroll: 1
				}
			}]
		}), $(".leaderboard-card .prev-arrow").hide(), $(".leaderboard-card").on("afterChange", (function(e, t, i) {
			0 === i ? ($(".leaderboard-card .prev-arrow").hide(), $(".leaderboard-card .next-arrow").show()) : $(".leaderboard-card .prev-arrow").show(), t.slideCount === i + 1 && $(".leaderboard-card .next-arrow").hide()
		}))
	})), jQuery((() => {
		function t(e) {
			$("#" + e).addClass("hidden"), $("body").removeClass("overflow-hidden")
		}
		$(".me-healthcare").each((function() {
			var e = $(this).children(".me-season-card ").length;
			e > 5 ? $(this).slick({
				initialSlide: 1,
				slidesToShow: 6,
				slidesToScroll: 1,
				autoplay: !1,
				arrows: !0,
				centerMode: !0,
				centerPadding: 0,
				prevArrow: '<button type="button" class="prev-arrow"><svg width="12" height="21" viewBox="0 0 12 21" fill="none" xmlns="http://www.w3.org/2000/svg" class="rotate-180"><path d="M1.28346 0.577913C0.904551 0.753695 0.732676 1.1951 0.892832 1.58963C0.935801 1.6951 2.16627 2.9451 5.35377 6.11698L9.76002 10.5037L5.35377 14.8865C2.16236 18.0662 0.935801 19.3123 0.892832 19.4178C0.861582 19.4998 0.834238 19.6365 0.834238 19.7224C0.834238 20.2849 1.40455 20.6639 1.90846 20.4295C2.13111 20.324 11.4436 11.0545 11.5413 10.8357C11.635 10.6365 11.635 10.3709 11.5413 10.1717C11.4436 9.95291 2.13111 0.683382 1.90846 0.577913C1.70924 0.484163 1.48268 0.484163 1.28346 0.577913Z" fill="#333333"/></svg></button>',
				nextArrow: '<button class="next-arrow"><svg width="12" height="21" viewBox="0 0 12 21" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1.28346 0.577913C0.904551 0.753695 0.732676 1.1951 0.892832 1.58963C0.935801 1.6951 2.16627 2.9451 5.35377 6.11698L9.76002 10.5037L5.35377 14.8865C2.16236 18.0662 0.935801 19.3123 0.892832 19.4178C0.861582 19.4998 0.834238 19.6365 0.834238 19.7224C0.834238 20.2849 1.40455 20.6639 1.90846 20.4295C2.13111 20.324 11.4436 11.0545 11.5413 10.8357C11.635 10.6365 11.635 10.3709 11.5413 10.1717C11.4436 9.95291 2.13111 0.683382 1.90846 0.577913C1.70924 0.484163 1.48268 0.484163 1.28346 0.577913Z" fill="#333333"/></svg></button>',
				responsive: [{
					centerMode: !1,
					breakpoint: 1921,
					settings: {
						slidesToShow: 5,
						slidesToScroll: 1
					}
				}, {
					breakpoint: 1441,
					settings: {
						slidesToShow: 4,
						slidesToScroll: 1
					}
				}, {
					breakpoint: 1e3,
					settings: {
						slidesToShow: 3,
						slidesToScroll: 1
					}
				}, {
					breakpoint: 750,
					settings: {
						slidesToShow: 2,
						slidesToScroll: 1
					}
				}, {
					breakpoint: 639,
					settings: {
						slidesToShow: 2,
						slidesToScroll: 1
					}
				}, {
					breakpoint: 400,
					settings: {
						slidesToShow: 1,
						slidesToScroll: 1
					}
				}]
			}) : (1 == e && ($(this).addClass("flex"), $(this).children(".me-season-card").addClass("single-card")), 2 == e && ($(this).addClass("flex"), $(this).children(".me-season-card").addClass("two-card")), 3 == e && ($(this).addClass("flex"), $(this).children(".me-season-card").addClass("three-card")), 4 == e && ($(this).addClass("flex"), $(this).children(".me-season-card").addClass("four-card")), 5 == e && ($(this).addClass("flex"), $(this).children(".me-season-card").addClass("five-card")))
		})), $(".me-healthcare .prev-arrow").hide(), $(".me-healthcare").each((function() {
			$(this).on("afterChange", (function(e, t, i) {
				0 === i ? ($(this).children(".prev-arrow").hide(), $(this).children(".next-arrow").show()) : $(this).children(".prev-arrow").show(), t.slideCount === i + 1 && $(this).children(".next-arrow").hide()
			}))
		})), $(".me-healthcare .preview_btn").click((function() {
			var e = $(this).attr("data-preview");
			$("#" + e).removeClass("hidden"), $("body").addClass("overflow-hidden"), meMedicalMainSlider(), checkPreviewHeight($(".preview-popup-box .modal-content").innerHeight())
		})), $(document).on("click", ".me-medical-sub > img", (function() {
			$(".me-medical-sub > img").removeClass("active_img"), $(this).addClass("active_img"), $(this).parent().siblings(".me-medical-main").slick("slickGoTo", $(this).data("id"))
		})), $(document).on("click", ".close-preview-modal", (function() {
			closePreviewModal(e.target.getAttribute("data-id"))
		})), $(document).on("click", ".compare_icon", (function() {
			$(".compare-modal").addClass("hidden"), $(".compare-modal").animate({
				bottom: "-3rem"
			}, "fast");
			var e = $(this).data("id");
			$("#" + e).removeClass("hidden"), $("#" + e).animate({
				bottom: 0
			}, "fast")
		})), $(document).on("click", ".close-compare", (function() {
			var e = $(this).data("id");
			$("#" + e).addClass("hidden"), $("#" + e).animate({
				bottom: "-3rem"
			})
		})), $(document).on("click", ".me-plus-icon", (function() {
			var e = $(this).data("id");
			$("#" + e).removeClass("hidden"), $("body").addClass("overflow-hidden")
		})), $(document).on("click", ".close-add-compare-modal", (function() {
			t($(this).data("id"))
		})), $(document).on("click", ".selected-items-box-delete", (function() {
			$(this).data("id");
			$(this).parent().remove(), e.preventDefault()
		})), $(document).on("click", (function(e) {
			var i = e.target.id,
				o = i.slice(0, 13),
				n = i.slice(0, 17);
			"preview-modal" === o ? closePreviewModal(i) : "add-compare-modal" === n && t(i)
		}))
	})), $(document).on("click", ".new-compare-btn", (function() {
		$(this).parent().parent().addClass("selected")
	})), $(".onsale-tab .onsale-item").each((function() {
		if ($(this).hasClass("selected")) {
			var e = $(this).attr("data-id");
			$("#" + e).removeClass("hidden")
		}
	})), $(".onsale-tab .onsale-item").on("click", (function() {
		var e = $(this).attr("data-id");
		$(this).siblings().removeClass("selected"), $(this).addClass("selected"), $("#" + e).siblings().addClass("hidden"), $("#" + e).removeClass("hidden")
	})), $(".mehc-preview-btn").click((function() {
		var e = $(this).data("preview");
		console.log("preview", $("#" + e)), $("#" + e).removeClass("hidden");
		var t = $("#" + e).children(".modal-content").innerHeight();
		$("body").addClass("overflow-hidden"), meMedicalMainSlider(), checkPreviewHeight(t)
	})), $(".mehc-compare-btn").click((function() {
		var e = $(this).data("id");
		$("#" + e).removeClass("hidden"), $("#" + e).animate({
			bottom: 0
		}, "fast")
	})), jQuery((() => {
		function e(e) {
			$("#" + e).addClass("hidden"), $("body").removeClass("overflow-hidden"), $("body").css("overflow", "auto")
		}
		$(".service-learnbtn").click((function() {
			var e = $(this).data("id");
			$("#" + e).removeClass("hidden"), $("body").addClass("overflow-hidden"), $("body").css("overflow", "hidden")
		})), $(".close-service-solution-modal").click((function() {
			e($(this).data("id"))
		})), $(document).on("click", (function(t) {
			var i = t.target.id;
			"service-solution-modal" === i.slice(0, 22) && e(i)
		})), $('[id^="service-solution-modal"] .services-lists-container .ss-filter-layout').each((function() {
			for (var e = $(this).children().eq(1), t = e.children().length, i = e, o = $('<div class="wrapper" />'), n = 0; n < t; n++) i.children().filter(":eq(" + n + "),:eq(" + (n + 1) + ")").wrapAll(o)
		}))
	})), jQuery((() => {
		if ($(".coupon-slider").slick({
				slidesToShow: 5,
				slidesToScroll: 1,
				autoplay: !1,
				arrows: !0,
				prevArrow: '<button type="button" class="prev-arrow"><svg width="12" height="21" viewBox="0 0 12 21" fill="none" xmlns="http://www.w3.org/2000/svg" class="rotate-180"><path d="M1.28346 0.577913C0.904551 0.753695 0.732676 1.1951 0.892832 1.58963C0.935801 1.6951 2.16627 2.9451 5.35377 6.11698L9.76002 10.5037L5.35377 14.8865C2.16236 18.0662 0.935801 19.3123 0.892832 19.4178C0.861582 19.4998 0.834238 19.6365 0.834238 19.7224C0.834238 20.2849 1.40455 20.6639 1.90846 20.4295C2.13111 20.324 11.4436 11.0545 11.5413 10.8357C11.635 10.6365 11.635 10.3709 11.5413 10.1717C11.4436 9.95291 2.13111 0.683382 1.90846 0.577913C1.70924 0.484163 1.48268 0.484163 1.28346 0.577913Z" fill="#333333"/></svg></button>',
				nextArrow: '<button type="button" class="next-arrow"><svg width="12" height="21" viewBox="0 0 12 21" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1.28346 0.577913C0.904551 0.753695 0.732676 1.1951 0.892832 1.58963C0.935801 1.6951 2.16627 2.9451 5.35377 6.11698L9.76002 10.5037L5.35377 14.8865C2.16236 18.0662 0.935801 19.3123 0.892832 19.4178C0.861582 19.4998 0.834238 19.6365 0.834238 19.7224C0.834238 20.2849 1.40455 20.6639 1.90846 20.4295C2.13111 20.324 11.4436 11.0545 11.5413 10.8357C11.635 10.6365 11.635 10.3709 11.5413 10.1717C11.4436 9.95291 2.13111 0.683382 1.90846 0.577913C1.70924 0.484163 1.48268 0.484163 1.28346 0.577913Z" fill="#333333"/></svg></button>',
				responsive: [{
					breakpoint: 1443,
					settings: {
						slidesToShow: 4,
						slidesToScroll: 1
					}
				}, {
					breakpoint: 1025,
					settings: {
						slidesToShow: 3,
						slidesToScroll: 1
					}
				}, {
					breakpoint: 999,
					settings: {
						slidesToShow: 3,
						variableWidth: !1,
						slidesToScroll: 1
					}
				}, {
					breakpoint: 750,
					settings: {
						slidesToShow: 2,
						variableWidth: !1,
						slidesToScroll: 1
					}
				}, {
					breakpoint: 400,
					settings: {
						slidesToShow: 1,
						slidesToScroll: 1,
						variableWidth: !1
					}
				}]
			}), $(".coupon-slider .prev-arrow").hide(), $(".coupon-slider").on("afterChange", (function(e, t, i) {
				0 === i ? ($(".coupon-slider .prev-arrow").hide(), $(".coupon-slider .next-arrow").show()) : $(".coupon-slider .prev-arrow").show(), t.slideCount === i + 1 ? $(".coupon-slider .next-arrow").hide() : $(".coupon-slider .next-arrow").show()
			})), $(".viewbundle-btn.collect").click((function() {
				$(this).parent().parent().parent().parent().parent().removeClass("collect").addClass("collected"), window.location.href.indexOf("9050"), $(this).parent().parent().parent().parent().parent().children(".gccard").removeClass("collect").addClass("collected")
			})), $(".small-coupon.new-small-coupon .company-name").click((function() {
				var e = $(this).data("id"),
					t = $(this).data("mainid");
				$("#" + e).addClass("show"), $("#viewbundle" + t).removeClass("show")
			})), $(".viewbundle-btn.bundle").click((function() {
				var e = $(this).data("id");
				document.body.style.overflowY = "hidden", $("#" + e).addClass("show")
			})), $(".cdmodal-close").click((function() {
				$(".collect-detail-modal").removeClass("show"), $("body").removeAttr("style")
			})), $(".white-close-btn").click((function() {
				$(".view-bundle-modal").removeClass("show"), $("body").removeAttr("style")
			})), $(".qua-collect-all-btn").click((function() {
				var e = $(this).data("id");
				$(this).attr("disabled", !0).addClass("pointer-events-none"), $("#" + e + " .small-coupon--container").each((function() {
					if ($(this).children().hasClass("collect")) {
						var e = $(this).children();
						e.removeClass("collect").addClass("collected"), e.children(".gccard").removeClass("collect").addClass("collected")
					}
				}))
			})), $(".collect-view-btn.collect").click((function() {
				console.log("click");
				var e = $(this).data("id");
				$("#" + e + " .small-coupon--container").children().removeClass("collect").addClass("collected"), $("#" + e + " .small-coupon--container").children().children(".gccard").removeClass("collect").addClass("collected")
			})), $(".gctab-container .onsale-tab .onsale-item:eq(0)").length > 0) {
			var e = $(".gctab-container .onsale-tab .onsale-item:eq(0)");
			e.addClass("selected");
			var t = e.data("id");
			$(".gctab-container #" + t).removeClass("hidden")
		}

		function i(e) {
			$("#" + e).addClass("show");
			document.body.style.overflowY = "hidden"
		}
		$(document).on("click", ".gccard-content-body-btn", (function() {
			i($(this).data("id"))
		})), $(document).on("click", ".open-coupon-popup", (function() {
			i($(this).data("id"))
		})), $(document).on("click", ".gccard-top", (function() {
			i($(this).data("id"))
		})), $(".detail-back-btn").click((function() {
			var e = $(this).data("id");
			$("#collect-detail-modal-back" + e).removeClass("show"), $(this).parent().parent().parent().removeClass("show"), $("#viewbundle" + e).addClass("show")
		})), $(window).on("load resize", (function() {
			var e = $(".small-coupon").height();
			$(window).innerHeight() <= 600 ? $(".cscard-container").css({
				height: e + "px"
			}) : $(".cscard-container").removeAttr("style")
		})), $(document).on("click", (function(e) {
			$(e.target).hasClass("view-bundle-modal show") && ($(e.target).removeClass("show"), $("body").removeAttr("style")), $(e.target).hasClass("collect-detail-modal show") && ($(e.target).removeClass("show"), $("body").removeAttr("style"))
		}))
	})), $(document).on("click", ".qua-collect-btn", (function() {
		$(this).text("Collected"), $(this).addClass("collected")
	})), $(document).on("click", ".gccard-content-bottom.login .collect-login,.collect-login", (function() {
		$(".lr-register-popup").addClass("flex"), $("body").addClass("overflow-hidden")
	})), $(document).on("click", ".clt-button", (function(e) {
		e.stopPropagation(), console.log("")
	})), $(document).on("click", ".small-coupon.new-small-coupon .show-detail-popup", (function(e) {
		e.stopPropagation();
		var t = $(this).data("id"),
			i = $(this).data("mainid");
		console.log(t), $("#" + t).addClass("show"), $("#viewbundle" + i).removeClass("show")
	})), $(window).click((function(e) {
		e.target.id.includes("collect-detail-modal-back") && ($(".collect-detail-modal").removeClass("show"), $("body").removeAttr("style"))
	})), $(document).on("click", ".me-season-promotion-container .preview_btn", (function() {
		var e = $(this).data("preview");
		$("#" + e).removeClass("hidden"), $("body").addClass("overflow-hidden"), meMedicalMainSlider(), checkPreviewHeight($("#" + e).children(".modal-content").innerHeight())
	})), $(document).on("click", ".healthcare-heart", (function() {
		$(this).addClass("hidden"), $(this).siblings(".healthcare-heart-selected").removeClass("hidden")
	})), $(document).on("click", ".healthcare-heart-selected", (function() {
		$(this).addClass("hidden"), $(this).siblings(".healthcare-heart").removeClass("hidden")
	})), $(".me-go-top").click((function() {
		return $("html, body").animate({
			scrollTop: 0
		}, "slow"), !1
	})), $(document).ready((function() {
		var e = document.getElementById("home-popup");
		if (null !== e) {
			e.classList.add("show");
			document.body;
			$("body").css("overflow", "hidden"), $("body").css("position", "fixed"), $("body").css("left", "0"), $("body").css("width", "100%"), $("body").css("height", "100%"), window.onclick = function(t) {
				t.target == e && (e.classList.remove("show"), $("body").css("overflow", ""), $("body").css("position", ""), $("body").css("left", ""))
			}, $(".hp-image").click((function() {
				"home-popup" == $(this).parent().attr("id") && (e.classList.remove("show"), $("body").css("overflow", ""), $("body").css("position", ""), $("body").css("left", ""))
			}))
		}
	})), $(".melo-lists .melo-list-item").length > 0) {
	$(".melo-list-item").first().addClass("active");
	var $first = $(".melo-list-item").first();
	changeCardNameFun($first), $(".melo-list-item").click((function() {
		$(this).siblings().removeClass("active"), $(this).addClass("active");
		var e = $(this).data("address");
		$(".melo-address").text(e), changeCardNameFun($(this))
	}))
}

function changeCardNameFun(e) {
	var t = e.data("image"),
		i = e.data("title"),
		o = e.data("title2"),
		n = e.data("dmarker");
	$(".name-card .name-image").attr("src", t), $(".name-card .name-section .title").text(i), $(".name-card .name-section .title2 > img").attr("src", n), $(".name-card .name-section .title2 span").text(o)
}

function scrollToIdFunc(e, t) {
	$("html, body").animate({
		scrollTop: e.offset().top - t
	}, 1e3)
}
$(".faqshow-btn").click((function() {
	$(this).toggleClass("less"), $(this).hasClass("less") ? ($(".faq-container").css({
		"max-height": "100%"
	}), $(this).children(".moretext").addClass("hidden"), $(this).children(".lesstext").removeClass("hidden"), $(this).children("img").css({
		transform: "rotate(180deg)"
	})) : ($(".faq-container").removeAttr("style"), $(this).children(".moretext").removeClass("hidden"), $(this).children(".lesstext").addClass("hidden"), $(this).children("img").removeAttr("style"))
})), $(".faq-container li").length < 3 ? $(".faqshow-btn").addClass("hidden") : $(".faqshow-btn").removeClass("hidden"), $(".remove-th,.text-empty").remove(), $(".has-tooltips").hover((function() {
	console.log($(this).siblings(".tooltipbox")), $(this).siblings(".tooltipbox").show()
}), (function() {
	console.log("unhover"), $(this).siblings(".tooltipbox").hide()
})), $(".fourcol-tr").length > 0 && $(".fourcol-tr th[rowspan]").addClass("header-col"), $("table.onecoltable").length > 0 && (1 == $("table.onecoltable").length && $("table.onecoltable").css({
	"margin-bottom": "0"
}), $("table.onecoltable").length > 1 && $("table.onecoltable").last({
	"margin-bottom": "0"
})), $(".pd-menu-tab--item").length > 0 && $(".pd-menu-tab--item").click((function() {
	var e = $(this).attr("data-id"),
		t = $("#" + e);
	$(this).parent().addClass("active"), $(this).parent().siblings().removeClass("active"), $(window).innerWidth < 1e3 ? scrollToIdFunc(t, 100) : scrollToIdFunc(t, 300)
})), $(window).on("scroll", (function() {
	$(".me-product-detail-menu-tab").length > 0 && $(".pd-menu-tab-container li").each((function() {
		var e = $(this).find("button").data("id");
		$("#" + e).length > 0 && $(window).scrollTop() >= $("#" + e).offset().top - 200 && ($(this).addClass("active"), $(this).siblings().removeClass("active"))
	}))
})), $(".right-panel .compare-btn").click((function() {
	var e = $(this).data("id");
	$("#" + e).removeClass("hidden").css({
		bottom: "0"
	})
})), $(".me-share-btn").click((function() {
	console.log("share click"), $("#me-share-modal").removeClass("hidden"), $("body").addClass("overflow-hidden")
}));
var $pdc = $(".product-detail-coupon");

function showSpecificPhoto(e) {
	var t = e.data("id"),
		i = $("#main-div"),
		o = $('.thumbnail[data-id="' + t + '"]').offset().top - i.offset().top + i.scrollTop();
	i.animate({
		scrollTop: o
	}, "slow")
}
if ($pdc.slick({
		arrows: !0,
		infinite: !0,
		slidesToShow: 2,
		slidesToScroll: 1,
		prevArrow: '<button type="button" class="prev-arrow"><svg width="12" height="21" viewBox="0 0 12 21" fill="none" xmlns="http://www.w3.org/2000/svg" class="rotate-180"><path d="M1.28346 0.577913C0.904551 0.753695 0.732676 1.1951 0.892832 1.58963C0.935801 1.6951 2.16627 2.9451 5.35377 6.11698L9.76002 10.5037L5.35377 14.8865C2.16236 18.0662 0.935801 19.3123 0.892832 19.4178C0.861582 19.4998 0.834238 19.6365 0.834238 19.7224C0.834238 20.2849 1.40455 20.6639 1.90846 20.4295C2.13111 20.324 11.4436 11.0545 11.5413 10.8357C11.635 10.6365 11.635 10.3709 11.5413 10.1717C11.4436 9.95291 2.13111 0.683382 1.90846 0.577913C1.70924 0.484163 1.48268 0.484163 1.28346 0.577913Z" fill="#333333"/></svg></button>',
		nextArrow: '<button type="button" class="next-arrow"><svg width="12" height="21" viewBox="0 0 12 21" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1.28346 0.577913C0.904551 0.753695 0.732676 1.1951 0.892832 1.58963C0.935801 1.6951 2.16627 2.9451 5.35377 6.11698L9.76002 10.5037L5.35377 14.8865C2.16236 18.0662 0.935801 19.3123 0.892832 19.4178C0.861582 19.4998 0.834238 19.6365 0.834238 19.7224C0.834238 20.2849 1.40455 20.6639 1.90846 20.4295C2.13111 20.324 11.4436 11.0545 11.5413 10.8357C11.635 10.6365 11.635 10.3709 11.5413 10.1717C11.4436 9.95291 2.13111 0.683382 1.90846 0.577913C1.70924 0.484163 1.48268 0.484163 1.28346 0.577913Z" fill="#333333"/></svg></button>',
		responsive: [{
			breakpoint: 1281,
			settings: {
				slidesToShow: 1,
				slidesToScroll: 1
			}
		}]
	}), $pdc.children(".prev-arrow").hide(), $pdc.on("afterChange", (function(e, t, i) {
		0 === i ? ($(this).children(".prev-arrow").hide(), $(this).children(".next-arrow").show()) : $(this).children(".prev-arrow").show(), t.slideCount === i + 1 ? $(this).children(".next-arrow").hide() : $(this).children(".next-arrow").show()
	})), 1 == $pdc.find(".small-coupon").length && $pdc.find(".slick-track").css({
		margin: "0"
	}), $(".see-all-btn").length > 0 && $(".see-all-btn").click((function() {
		$(".gallery-with-filter").removeClass("hidden"), $("body").addClass("overflow-hidden")
	})), $(".me-product-detail-gallery").length > 0 && ($(".head-thumbnail").click((function() {
		var e = $(this).data("id");
		$(".gallery-with-filter").removeClass("hidden"), $("body").addClass("overflow-hidden"), showSpecificPhoto($('.thumbnail[data-id="' + e + '"]'))
	})), 4 == $(".item-container .item").length && $(".item-container").addClass("fouritems-grid")), $(".thumbnail").click((function() {
		var e = $(this).data("id");
		$("#photo-enlarge-popup").removeClass("hidden"), $(".gallery-with-filter").addClass("hidden"), picBtnFunction($('.pic-btn[data-id="' + e + '"]'))
	})), $(".filter-tag li").click((function() {
		var e = $(this).data("id"),
			t = $(this).parent().siblings().attr("id"),
			i = $("#" + t),
			o = $("#" + e).offset().top - i.offset().top + i.scrollTop();
		$(this).siblings().removeClass("active"), $(this).addClass("active"), i.animate({
			scrollTop: o
		}, "slow")
	})), $(".main-tab li").click((function() {
		var e = $(this).data("id");
		$(this).addClass("active"), $(this).siblings().removeClass("active"), $(e).removeClass("hidden"), $(e).siblings().addClass("hidden"), $(e).find(".filter-tag li").first().addClass("active")
	})), $(".close-modal").length > 0 && $(".close-modal").click((function() {
		var e = $(this).data("id");
		$("#" + e).addClass("hidden"), $("body").removeClass("overflow-hidden")
	})), $(document).on("click", (function(e) {
		"gallery-tab-popup" == e.target.id && ($("#gallery-tab-popup").addClass("hidden"), $("body").removeClass("overflow-hidden"))
	})), $(".one-slider").length > 0) {
	var slideWrapper = $(".one-slider"),
		iframes = slideWrapper.find(".embed-player"),
		lazyImages = slideWrapper.find(".slide-image"),
		lazyCounter = 0;
	slideWrapper.on("init", (function(e) {
		var t = $(e.currentTarget);
		setTimeout((function() {
			playPauseVideo(t, "play")
		}), 1e3)
	})), slideWrapper.on("beforeChange", (function(e, t, i) {
		playPauseVideo($(t.$slider), "pause"), photoNumber(t.slideCount, i)
	})), slideWrapper.on("afterChange", (function(e, t, i) {
		playPauseVideo($(t.$slider), "play"), photoNumber(t.slideCount, i);
		var o = $(".picture-album"),
			n = $('.pic-btn[data-id="' + i + '"]'),
			s = n.offset().left - o.offset().left + o.scrollLeft(),
			a = n.innerWidth() * (i + 1) + 8;
		containerWidth = o.innerWidth() - 64, a > containerWidth && o.animate({
			scrollLeft: s
		}, "slow"), $('.pic-btn[data-id="' + i + '"]').addClass("is-active"), $('.pic-btn[data-id="' + i + '"]').siblings().removeClass("is-active")
	}));
	var $status = $(".pagingInfo");
	slideWrapper.slick({
		slidesToShow: 1,
		slidesToScroll: 1,
		arrows: !0,
		fade: !1,
		adaptiveHeight: !0,
		infinite: !1,
		useTransform: !0,
		speed: 400,
		cssEase: "cubic-bezier(0.77, 0, 0.18, 1)",
		prevArrow: '<button type="button" class="prev-arrow"><svg width="12" height="21" viewBox="0 0 12 21" fill="none" xmlns="http://www.w3.org/2000/svg" class="rotate-180"><path d="M1.28346 0.577913C0.904551 0.753695 0.732676 1.1951 0.892832 1.58963C0.935801 1.6951 2.16627 2.9451 5.35377 6.11698L9.76002 10.5037L5.35377 14.8865C2.16236 18.0662 0.935801 19.3123 0.892832 19.4178C0.861582 19.4998 0.834238 19.6365 0.834238 19.7224C0.834238 20.2849 1.40455 20.6639 1.90846 20.4295C2.13111 20.324 11.4436 11.0545 11.5413 10.8357C11.635 10.6365 11.635 10.3709 11.5413 10.1717C11.4436 9.95291 2.13111 0.683382 1.90846 0.577913C1.70924 0.484163 1.48268 0.484163 1.28346 0.577913Z" fill="#333333"/></svg></button>',
		nextArrow: '<button type="button" class="next-arrow"><svg width="12" height="21" viewBox="0 0 12 21" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1.28346 0.577913C0.904551 0.753695 0.732676 1.1951 0.892832 1.58963C0.935801 1.6951 2.16627 2.9451 5.35377 6.11698L9.76002 10.5037L5.35377 14.8865C2.16236 18.0662 0.935801 19.3123 0.892832 19.4178C0.861582 19.4998 0.834238 19.6365 0.834238 19.7224C0.834238 20.2849 1.40455 20.6639 1.90846 20.4295C2.13111 20.324 11.4436 11.0545 11.5413 10.8357C11.635 10.6365 11.635 10.3709 11.5413 10.1717C11.4436 9.95291 2.13111 0.683382 1.90846 0.577913C1.70924 0.484163 1.48268 0.484163 1.28346 0.577913Z" fill="#333333"/></svg></button>'
	}), $(".pic-btn").click((function() {
		picBtnFunction($(this))
	})), $(".backImg,.back-album-btn").click((function() {
		closePhotoEnlargeModal()
	})), $(".back-album-btn").click((function() {
		$(".gallery-with-filter").removeClass("hidden")
	}))
}

function picBtnFunction(e) {
	var t = e.data("id");
	e.siblings().removeClass("is-active"), e.addClass("is-active"), $(".one-slider").slick("slickGoTo", t)
}

function closePhotoEnlargeModal() {
	$("#photo-enlarge-popup").addClass("hidden")
}

function scrollTocLeft(e) {
	const t = e.offsetLeft + e.offsetWidth,
		i = e.parentNode.offsetLeft + e.parentNode.offsetWidth;
	t >= i + e.parentNode.scrollLeft ? e.parentNode.scrollLeft = t - i : t <= e.parentNode.offsetLeft + e.parentNode.scrollLeft && (e.parentNode.scrollLeft = e.offsetLeft - e.parentNode.offsetLeft)
}

function photoNumber(e, t) {
	console.log(e);
	var i = (t || 0) + 1;
	$status.text(i + " / " + e);
	var o = t || 0;
	$('.pic-btn[data-id="' + o + '"]').addClass("is-active"), $('.pic-btn[data-id="' + o + '"]').siblings().removeClass("is-active")
}

function playPauseVideo(e, t) {
	var i, o, n, s, a;
	if (o = (i = e.find(".slick-current")).attr("class").split(" ")[1], s = i.find("iframe").get(0), n = i.data("video-start"), "vimeo" === o) switch (t) {
		case "play":
			null != n && n > 0 && !i.hasClass("started") && (i.addClass("started"), postMessageToPlayer(s, {
				method: "setCurrentTime",
				value: n
			})), postMessageToPlayer(s, {
				method: "play",
				value: 1
			});
			break;
		case "pause":
			postMessageToPlayer(s, {
				method: "pause",
				value: 1
			})
	} else if ("youtube" === o) switch (t) {
		case "play":
			postMessageToPlayer(s, {
				event: "command",
				func: "mute"
			}), postMessageToPlayer(s, {
				event: "command",
				func: "playVideo"
			});
			break;
		case "pause":
			postMessageToPlayer(s, {
				event: "command",
				func: "pauseVideo"
			})
	} else "video" === o && null != (a = i.children("video").get(0)) && ("play" === t ? a.play() : a.pause())
}
$(".close-syncing-btn").click((function() {
	closePhotoEnlargeModal(), $("#gallery-tab-popup").addClass("hidden"), $("body").removeClass("overflow-hidden")
})), $(document).on("click", (function(e) {
	"photo-enlarge-popup" === e.target.id && closePhotoEnlargeModal()
}));
var $watch = document.getElementById("watch");

function stopWatchFunc(e) {
	var t = e.getAttribute("data-time"),
		i = new Date(t);
	setInterval((function() {
		let t = i.getHours(),
			o = i.getMinutes(),
			n = i.getSeconds();
		e.innerHTML = t.toLocaleString(void 0, {
			minimumIntegerDigits: 2
		}) + ":" + o.toLocaleString(void 0, {
			minimumIntegerDigits: 2
		}) + ":" + n.toLocaleString(void 0, {
			minimumIntegerDigits: 2
		})
	}), 1e3)
}
if (null != $watch && (stopWatchFunc($watch), window.addEventListener("DOMContentLoaded", (e => {
		$(".yellow-bar").hasClass("hidden") ? $(".main-card").removeAttr("style") : $(".main-card").css({
			"margin-top": "-10px"
		})
	}))), $(".me-deal-fixed-card").length > 0) {
	var fixmeTop = $(".me-deal-fixed-card").offset().top;

	function fixedResize() {
		$(window).innerWidth() < 1e3 ? $(window).innerWidth() > 640 && fixedDealScroll($(".menu-with-searchbar:eq(1)").innerHeight() + 50) : fixedDealScroll($(".menu-with-searchbar ").height() + 50)
	}
	fixedResize(), $(window).resize((function() {
		fixedResize()
	}))
}

function fixedDealScroll(e) {
	$(window).scroll((function(t) {
		var i = $(".me-you-may-also-like").position().top - 400,
			o = $("#plan-option").position().top - 320,
			n = $("#plan-option").innerHeight() + o + 100,
			s = $(document).scrollTop(),
			a = $(window).scrollTop(),
			d = $(".deal-fixed-position").innerWidth();
		a >= fixmeTop && s < i ? ($(".me-deal-fixed-card").css({
			position: "fixed",
			top: e + "px",
			width: d + "px"
		}).addClass("deal-right"), a > o && a < n ? $(".me-deal-fixed-card").addClass("hidden") : $(".me-deal-fixed-card").removeClass("hidden")) : $(".me-deal-fixed-card").css({
			position: "static"
		}).removeClass("deal-right").removeAttr("style")
	}))
}
$(".main-card .cart_btn").click((function() {
	var e = $("#plan-option").offset().top - 200;
	$("html, body").animate({
		scrollTop: e
	}, "slow")
}));
const createTabContent = (e, t) => {
	const i = document.querySelector("#planOptTabs"),
		o = document.querySelector("#recipient1"),
		n = document.createElement("div");
	n.classList.add("plan-option-tab"), n.setAttribute("id", "recipient" + e), n.innerHTML = o.innerHTML;
	const s = n.querySelectorAll("[id]"),
		a = n.querySelectorAll("label"),
		d = n.querySelectorAll(".form-group.plan-group"),
		l = n.querySelector(".btn-text");
	l && (l.textContent = "Choose Location and Time"), s.forEach((t => {
		const i = t.id,
			o = i.match(/-\d+/g) ? i.replace(/-\d+/g, `-${e}`) : i.replace(i, `${i}-${e}`);
		if (t.id = i.replace(i, o), t.onclick) {
			const i = t.getAttribute("onclick").replace(/\d+/, e);
			t.setAttribute("onclick", i)
		}
		if (t.dataset.id && t.setAttribute("data-id", e), t.dataset.qtyelem) {
			const i = t.dataset.qtyelem.replace(/-\d+/, `-${e}`);
			t.setAttribute("data-qtyElem", i)
		}
		if (t.classList.contains("selected-plan-qty")) {
			n.querySelectorAll(".selected-plan-qty").forEach((e => {
				e.innerText = "0"
			}))
		}
		if ("checkbox" == t.type && t.name) {
			const i = /\d+\[\]/;
			if (t.name.match(i)) {
				const o = t.name.replace(i, `${e}[]`);
				t.setAttribute("name", o)
			}
		} else if (t.name) {
			const i = t.name.replace(/\d+/, `${e}`);
			t.setAttribute("name", i)
		}
	})), a.forEach((t => {
		const i = t.htmlFor,
			o = i.match(/-\d+/g) ? i.replace(/-\d+/g, `-${e}`) : i.replace(i, `${i}-${e}`);
		t.htmlFor = i.replace(i, o)
	})), d.forEach((t => {
		if (t.querySelectorAll(".select-plan").forEach((e => {
				e.disabled && (e.disabled = !1)
			})), t.dataset.group) {
			const i = t.dataset.group.replace(/-\d+/, `-${e}`);
			t.setAttribute("data-group", i)
		}
	})), i.appendChild(n)
};
let tabCount = 1;
const addOptTabBtn = document.querySelector("#addPlanOptTab"),
	removeOptTabBtn = document.querySelector("#removePlanOptTab"),
	reCalculatePackagePrice = (e, t) => {
		const i = document.querySelector(`#recipient${e}`).querySelectorAll("input[type=radio].select-package");
		if (i.length <= 0) return;
		const o = document.querySelector("#total_amount"),
			n = document.querySelector("#original-price"),
			s = document.querySelectorAll(".total_amount"),
			a = document.querySelectorAll(".original-price");
		i.forEach((e => {
			if (e.checked) {
				const i = e.dataset.discount,
					d = i ? isNaN(Number(i)) ? 0 : Number(i) : 0,
					l = e.dataset.price,
					r = l ? isNaN(Number(l)) ? 0 : Number(l) : 0;
				if (d) {
					let e, i, l = 0,
						c = 0;
					"addition" === t ? (l = Number(Number(d) + Number(o.value)).toFixed(2), e = Number(l).toLocaleString("en-US", {
						minimumFractionDigits: 2
					}), c = Number(Number(r) + Number(n.value)).toFixed(2), i = Number(c).toLocaleString("en-US", {
						minimumFractionDigits: 2
					})) : (l = Number(Number(o.value) - Number(d)).toFixed(2), c = Number(Number(n.value) - Number(r)).toFixed(2), e = Number(l).toLocaleString("en-US", {
						minimumFractionDigits: 2
					}), i = Number(c).toLocaleString("en-US", {
						minimumFractionDigits: 2
					})), o.value = l, n.value = c, s.forEach((t => {
						t.innerText = e
					})), a.forEach((e => {
						e.innerText = i
					}))
				} else {
					let e, i = 0;
					"addition" === t ? (i = Number(Number(r) + Number(o.value)).toFixed(2), e = Number(i).toLocaleString("en-US", {
						minimumFractionDigits: 2
					})) : (i = Number(Number(o.value) - Number(r)).toFixed(2), e = Number(i).toLocaleString("en-US", {
						minimumFractionDigits: 2
					})), o.value = i, s.forEach((t => {
						t.innerText = e
					}))
				}
			}
		}))
	},
	calculatePrice = (e, t) => {
		if (0 === document.querySelectorAll("input[type=radio].select-package").length) {
			const e = document.querySelector("#total_amount"),
				i = document.querySelector("#original-price"),
				o = document.querySelector("#totalPrice"),
				n = document.querySelector("#originalPrice"),
				s = document.querySelectorAll(".total_amount"),
				a = document.querySelectorAll(".original-price"),
				d = e.value ? isNaN(Number(e.value)) ? 0 : Number(e.value) : 0,
				l = i ? isNaN(Number(i.value)) ? 0 : Number(i.value) : 0,
				r = o.value ? isNaN(Number(o.value)) ? 0 : Number(o.value) : 0,
				c = n ? isNaN(Number(n.value)) ? 0 : Number(n.value) : 0;
			let p, u, h = 0,
				m = 0;
			"addition" === t ? (h = Number(Number(d) + Number(r)).toFixed(2), p = Number(h).toLocaleString("en-US", {
				minimumFractionDigits: 2
			}), m = Number(Number(l) + Number(c)).toFixed(2), u = Number(m).toLocaleString("en-US", {
				minimumFractionDigits: 2
			})) : (h = Number(Number(d) - Number(r)).toFixed(2), p = Number(h).toLocaleString("en-US", {
				minimumFractionDigits: 2
			}), m = Number(Number(l) - Number(c)).toFixed(2), u = Number(m).toLocaleString("en-US", {
				minimumFractionDigits: 2
			})), e.value = h, i && (i.value = m), s.forEach((e => {
				e.innerText = p
			})), a.forEach((e => {
				e.innerText = u
			}))
		} else reCalculatePackagePrice(e, t)
	},
	addPlanOptTab = () => {
		if (5 === tabCount) return;
		tabCount++, tabCount > 4 && (addOptTabBtn.classList.remove("add-tab-available"), addOptTabBtn.classList.add("add-tab-unavailable"));
		document.querySelector("#addTabNumber").innerText = tabCount;
		const e = document.querySelector("#tabBtnLists");
		removeOptTabBtn.classList.remove("add-tab-unavailable"), removeOptTabBtn.classList.add("add-tab-available");
		const t = document.createElement("li");
		t.classList.add("mr-2"), t.innerHTML = `<button type="button" role="button" id="recipientBtn${tabCount}" class="tab-btn py-2 4xl:py-3 px-5 4xl:px-10 bg-meBg rounded-lg rounded-b-none" onclick="openPlanOptTab(${tabCount})">Recipient ${tabCount}</button>`, e.appendChild(t);
		addOptTabBtn.dataset.component;
		createTabContent(tabCount);
		const i = $("html").attr("lang");
		getArea(tabCount, "en" === i ? "en-us" : "zh-cn"), calculatePrice(tabCount, "addition"), calculateAverage()
	},
	openPlanOptTab = e => {
		const t = document.querySelectorAll(".plan-option-tab"),
			i = document.querySelector(`#recipient${e}`),
			o = document.querySelectorAll(".tab-btn"),
			n = document.querySelector(`#recipientBtn${e}`),
			s = document.querySelectorAll(".add-tab-number"),
			a = document.querySelector(`#addTabBtn${e}`);
		t.forEach((e => {
			e.classList.remove("plan-option-active")
		})), o.forEach((e => {
			e.classList.remove("btn-active")
		})), s.forEach((e => {
			e.classList.remove("btn-active")
		})), i.classList.add("plan-option-active"), n.classList.add("btn-active"), a && a.classList.add("btn-active")
	},
	openPrevTab = e => {
		const t = document.querySelector(`#recipient${e}`),
			i = document.querySelector(`#recipientBtn${e}`);
		t.classList.add("plan-option-active"), i.classList.add("btn-active")
	},
	reCalculateAddOnPrice = e => {
		const t = $("#total_amount");
		let i = Number(t.val());
		const o = e.querySelectorAll("input[type=checkbox].add_on");
		if (0 == o.length) return;
		o.forEach((e => {
			if (e.checked) {
				const t = Number(e.dataset.price);
				i -= t
			}
		}));
		const n = Number(i).toFixed(2),
			s = Number(n).toLocaleString("en-US", {
				minimumFractionDigits: 2
			});
		t.val(n), $(".total_amount").text(s)
	},
	removePlanOptTab = () => {
		if (1 === tabCount) return;
		addOptTabBtn.classList.add("add-tab-available"), addOptTabBtn.classList.remove("add-tab-unavailable");
		const e = document.querySelector(`#recipient${tabCount}`),
			t = document.querySelector("#addTabNumber"),
			i = document.querySelector(`#recipientBtn${tabCount}`);
		e.classList.contains("plan-option-active") && openPrevTab(tabCount - 1), calculatePrice(tabCount, "subtraction"), reCalculateAddOnPrice(e), e.remove(), i.parentElement.remove(), tabCount--, t.innerText = tabCount, 1 === tabCount && (removeOptTabBtn.classList.remove("add-tab-available"), removeOptTabBtn.classList.add("add-tab-unavailable")), calculateAverage()
	};
addOptTabBtn && addOptTabBtn.addEventListener("click", addPlanOptTab), removeOptTabBtn && removeOptTabBtn.addEventListener("click", removePlanOptTab);
const daysTag = document.querySelector("#daysTag-1"),
	monthAndYear = document.querySelector("#month-year-1"),
	prevNextIcon = document.querySelectorAll(".prev-next-icon");
let currDate = new Date,
	currYear = currDate.getFullYear(),
	currMonth = currDate.getMonth();
const weekdays = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
	months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
	availableDate = [15, 16, 17, 18, 19, 20, 23, 24, 25, 26, 27, 28, 29, 30],
	holidays = [25, 29],
	renderCalendar = (e, t, i) => {
		let o = new Date(currYear, currMonth, 1).getDay(),
			n = new Date(currYear, currMonth + 1, 0).getDate(),
			s = new Date(currYear, currMonth, n).getDay();
		const a = document.querySelector(`#selectedDate-${e}`),
			d = document.querySelector(`#choosedDate-${e}`);
		let l = "";
		for (let e = o; e > 0; e--) l += '<li class="inactive"></li>';
		for (let t = 1; t <= n; t++) {
			let i = t !== currDate.getDate() || currMonth !== (new Date).getMonth() || currYear !== (new Date).getFullYear() || a.value ? "" : "active";
			if ("active" === i) {
				const e = String(currMonth + 1).padStart(2, "0");
				a.value = `${currYear}-${e}-${t}`, d.textContent = `${weekdays[currDate.getDay()]}, ${months[currMonth]} ${t}`
			}
			if (a.value) {
				const e = new Date(a.value),
					o = e.getMonth(),
					n = e.getFullYear();
				i = t === e.getDate() && currMonth === o && currYear === n ? "active" : ""
			}
			const o = availableDate.some((e => e == t));
			l += holidays.some((e => e == t)) ? `<li><button class="${i} is-holiday" disabled>${t}</button></li>` : o ? `<li><button data-id="${e}" class="${i} available calendar-date-${e}" onclick="datePicker(event, ${currYear}, ${currMonth}, ${t})">${t}</button></li>` : `<li><button class="unavailable" disabled>${t}</button></li>`
		}
		for (let e = s; e < 6; e++) l += '<li class="inactive"></li>';
		t.innerText = `${months[currMonth]} ${currYear}`, i.innerHTML = l
	};
monthAndYear && daysTag && renderCalendar(1, monthAndYear, daysTag);
const prevNextMonth = (e, t) => {
		const i = document.querySelector(`#daysTag-${t}`),
			o = document.querySelector(`#month-year-${t}`),
			n = e.currentTarget;
		currMonth = n.id === `prevMonth-${t}` ? currMonth - 1 : currMonth + 1, currMonth < 0 || currMonth > 11 ? (date = new Date(currYear, currMonth, (new Date).getDate()), currYear = date.getFullYear(), currMonth = date.getMonth()) : date = new Date, renderCalendar(t, o, i)
	},
	datePicker = (e, t, i, o) => {
		const n = e.target,
			s = document.querySelector(`#selectedDate-${tabCount}`),
			a = document.querySelector(`#choosedDate-${tabCount}`),
			d = n.dataset.id,
			l = document.querySelector(`.calendar-date-${d}.active`),
			r = new Date(t, i, o);
		l && l.classList.remove("active"), n.classList.add("active"), s.value = `${t}-${String(i+1).padStart(2,"0")}-${o}`, a.textContent = `${weekdays[r.getDay()]}, ${months[i]} ${o}`
	},
	accordionContainer = document.querySelectorAll(".accordion-container");
accordionContainer.forEach((e => {
	const t = e.querySelector(".accordion-collapse-btn");
	t.addEventListener("click", (() => {
		console.log(t), e.classList.toggle("active");
		const i = e.querySelector(".accordion-body");
		e.classList.contains("active") ? i.style.height = `${i.scrollHeight}px` : i.style.height = "0px"
	}))
}));
const accordionBody = document.querySelectorAll(".accordion-body");
accordionBody.forEach((e => {
	const t = e.querySelectorAll("ul li");
	e.querySelectorAll(".sidebar-seemore").forEach((e => {
		t.length > 8 ? e.classList.remove("hidden") : e.classList.add("hidden")
	}))
})), $(document).on("click", ".seeall-btn", (function() {
	var e = $(this).parent().parent(),
		t = $(this).parent();
	t.addClass("hidden"), t.siblings(".see-section").removeClass("hidden"), e.find("ul li").addClass("showList")
})), $(document).on("click", ".seeless-btn", (function() {
	var e = $(this).parent().parent(),
		t = $(this).parent();
	t.addClass("hidden"), t.siblings(".see-section").removeClass("hidden"), e.find("ul li").removeClass("showList")
}));
const openPlanInfoBtn = document.querySelector("#open-plan-info-popup"),
	closePlanInfoBtn = document.querySelector("#close-plan-info-popup"),
	planInfoPopup = document.querySelector("#plan-info-popup"),
	openPlanInfoPopup = () => {
		const e = window.pageYOffset || document.documentElement.scrollTop || document.body.scrollTop || 0;
		document.body.style.overflowY = "hidden", document.documentElement.scrollTop = document.body.scrollTop = e, planInfoPopup.showModal()
	},
	closePlanInfoPopup = () => {
		document.body.style.overflowY = "auto", planInfoPopup.close()
	};
openPlanInfoBtn && planInfoPopup && openPlanInfoBtn.addEventListener("click", openPlanInfoPopup), closePlanInfoBtn && planInfoPopup && (closePlanInfoBtn.addEventListener("click", closePlanInfoPopup), document.addEventListener("keydown", (e => {
	"Escape" === e.key && (document.body.style.overflowY = "auto")
})), planInfoPopup.addEventListener("click", (e => {
	const t = planInfoPopup.getBoundingClientRect();
	(e.clientX < t.left || e.clientX > t.right || e.clientY < t.top || e.clientY > t.bottom) && (planInfoPopup.close(), document.body.style.overflowY = "auto")
}))), $(document).ready((function() {
	$(document).on("change", "input[type='checkbox'].select-plan", (function() {
		const e = $(`#${$(this).data("qtyelem")}`);
		let t = e.data("qty") ? isNaN(Number(e.data("qty"))) ? 0 : Number(e.data("qty")) : 0;
		const i = $(this).data("qty") ? isNaN(Number($(this).data("qty"))) ? 0 : Number($(this).data("qty")) : 0;
		$(this).prop("checked") ? t += i : t -= i, e.data("qty", t), e.text(t)
	})), $(document).on("change", "input.decide-later", (function() {
		const e = $(this).attr("id"),
			t = $(`.plan-group[data-group="${e}"]`).find("input.select-plan");
		console.log(t.data("qtyelem"));
		const i = $(`#${t.data("qtyelem")}`);
		$(this).prop("checked") ? (t.prop("checked", !1).prop("disabled", !0), i.data("qty", 0), i.text(0)) : t.prop("disabled", !1)
	}))
}));
const addToCartBtn = document.querySelector(".add-to-cart--btn"),
	reminderPopup = document.querySelector(".reminder-popup");
$(document).on("click", "button.add-to-cart--btn", (function() {
	reminderPopup.classList.remove("hidden", "fade-out"), reminderPopup.classList.add("fade-in"), setTimeout((() => {
		reminderPopup.classList.add("fade-out"), reminderPopup.classList.remove("fade-in"), setTimeout((() => {
			reminderPopup.classList.add("hidden")
		}), 1e3)
	}), 3e3)
}));
const calculateAverage = () => {
	const e = document.querySelector("#averagePrice"),
		t = document.querySelector("#total_amount"),
		i = t ? Number(t.value) : 0;
	if (!e || isNaN(i)) return;
	const o = document.querySelectorAll(".plan-option-tab");
	if (o.length <= 1) return void(e.innerText = "");
	const n = (i / o.length).toFixed(2);
	e.innerText = `(Avg. $${n})`
};
"loading" === document.readyState ? document.addEventListener("DOMContentLoaded", calculateAverage) : calculateAverage();
const popupInfoContainers = document.querySelectorAll(".popup-body-container");
popupInfoContainers.forEach((e => {
	e.querySelector(".popup-info-header").addEventListener("click", (() => {
		e.classList.toggle("active");
		const t = e.querySelector(".popup-info-items");
		e.classList.contains("active") ? t.style.height = "100%" : t.style.height = "0px"
	}))
}));
const openPlanOptToolTip = e => {
	const t = e.currentTarget.dataset.targetId;
	document.querySelector(`#${t}`).classList.toggle("hidden")
};

function closeShareModal(e) {
	$("#" + e).addClass("hidden"), $("body").removeClass("overflow-hidden")
}
document.addEventListener("click", (e => {
	const t = document.querySelectorAll(".plan-tag-open");
	document.querySelectorAll(".plan-tag-tooltip").forEach(((i, o) => {
		i.contains(e.target) || t[o].contains(e.target) || i.classList.add("hidden")
	}))
})), $(".close-share").click((function() {
	closeShareModal($(this).data("id"))
})), $(document).on("click", (function(e) {
	var t = e.target.id;
	"me-share-modal" === t && closeShareModal(t)
})), $(".explaination-image-section").length > 0 && (1 == $(".explaination-img-div").length && $(".explaination-img-div").css({
	"padding-bottom": "0"
}), $(".explaination-img-div").length > 1 && $(".explaination-img-div").last().css({
	"padding-bottom": "0"
}));
const openBtns = document.querySelectorAll("[data-open-dropdown]"),
	dropDowns = document.querySelectorAll("[data-dropdown]");
openBtns.forEach((e => {
	e.addEventListener("click", (() => {
		const t = document.querySelector(e.dataset.openDropdown),
			i = t.querySelectorAll(".sidebar-tab"),
			o = t.querySelectorAll(".content-group");
		dropDowns.forEach((e => {
			e.classList.add("hidden")
		})), o.forEach(((e, t) => {
			0 === t ? e.classList.add("content-group-active") : e.classList.remove("content-group-active")
		})), i.forEach(((e, t) => {
			0 === t ? e.classList.add("sidebar-tab-active") : e.classList.remove("sidebar-tab-active")
		})), t.classList.remove("hidden")
	}))
})), document.addEventListener("click", (e => {
	const t = e.target;
	isIgnoredElem(t) || dropDowns.forEach((e => {
		e.contains(t) || e.classList.add("hidden")
	}))
}));
const isIgnoredElem = e => !!(e.classList.contains("dropdown-with-sidebar") || e.classList.contains("search-field") || e.classList.contains("search-field-label") || e.classList.contains("search-field-data")),
	groupTargets = document.querySelectorAll("[data-group-target]"),
	contents = document.querySelectorAll("[data-dropdown-group]");
groupTargets.forEach((e => {
	e.addEventListener("click", (() => {
		const t = document.querySelector(e.dataset.groupTarget);
		console.log(e.dataset.groupTarget, t), contents.forEach((e => {
			e.classList.remove("content-group-active")
		})), groupTargets.forEach((e => {
			e.classList.remove("sidebar-tab-active")
		})), e.classList.add("sidebar-tab-active"), t.classList.add("content-group-active")
	}))
}));
const quickPreviewBtn = document.querySelectorAll(".quick-preview-btn"),
	quickPreviewModal = document.querySelectorAll(".quick-preview-modal"),
	scrollContainer = document.querySelectorAll(".tag-group"),
	wishListBtns = document.querySelectorAll(".wishlist_icon");
quickPreviewBtn.forEach((e => {
	e.addEventListener("click", (e => {
		const t = e.target.dataset.preview;
		document.querySelector(`#${t}`).showModal(), firstSlider($("#" + t)), document.body.style.overflowY = "hidden", document.body.style.overflowX = "hidden"
	}))
}));
const openQuickPreview = e => {
		const t = e.target.dataset.preview;
		firstSlider($("#" + t));
		document.querySelector(`#${t}`).showModal(), document.body.style.overflowY = "hidden"
	},
	closeQuickPreviewModal = e => {
		const t = e.currentTarget.dataset.previewid;
		document.querySelector(`#${t}`).close(), document.body.style.overflowY = "auto"
	};

function firstSlider(e) {
	var t = $(e).find(".me-medical-main");
	t.slick({
		slidesToShow: 1,
		slidesToScroll: 1,
		autoplay: !1,
		arrows: !1,
		variableWidth: !0,
		variableHeight: !0
	}), t.on("afterChange", (function(t, i, o) {
		$(e).find(".me-medical-sub > img").removeClass("active_img"), $(e).find('.me-medical-sub > img[data-id="' + o + '"]').addClass("active_img")
	}))
}

function pltabsListFunction(e, t) {
	$(t).find(e).children(".me-season-card").length < 4 && $("#list-view " + e).addClass("cus-start"), $(window).innerWidth() < 1281 && $(window).innerWidth() > 541 && $(t).find(e).children(".me-season-card").last().addClass("last-card")
}
var downloadTimer, $tabItem, $id;
(quickPreviewModal.forEach((e => {
	e.addEventListener("click", (t => {
		const i = e.getBoundingClientRect(),
			o = e.querySelector(".compare-modal");
		!(t.clientX < i.left || t.clientX > i.right || t.clientY < i.top || t.clientY > i.bottom) || t.target.classList.contains("compare-modal") || o.contains(t.target) || (e.close(), document.body.style.overflowY = "auto")
	}))
})), quickPreviewModal.length > 0 && document.addEventListener("keydown", (e => {
	"Escape" === e.key && (document.body.style.overflowY = "auto")
})), scrollContainer.forEach((e => {
	e.addEventListener("mousemove", (t => {
		let i, o, n = !1;
		e.addEventListener("mousedown", (t => {
			n = !0, i = t.pageX - e.offsetLeft, o = e.scrollLeft
		})), e.addEventListener("mouseleave", (() => {
			n = !1
		})), e.addEventListener("mouseup", (() => {
			n = !1
		})), e.addEventListener("mousemove", (t => {
			if (!n) return;
			t.preventDefault();
			const s = 5 * (t.pageX - e.offsetLeft - i);
			e.scrollLeft = o - s
		}))
	}))
})), wishListBtns.forEach((e => {
	e.addEventListener("click", (e => {
		e.currentTarget.classList.toggle("selected-whislist-icon")
	}))
})), $(document).on("click", "button.preview-add-to-cart--btn", (function() {
	const e = $(".preview-reminder-popup");
	e.removeClass("hidden fade-out"), e.addClass("fade-in"), setTimeout((() => {
		e.addClass("fade-out"), e.removeClass("fade-in"), setTimeout((() => {
			e.addClass("hidden")
		}), 1e3)
	}), 3e3)
})), $(window).click((function(e) {
	e.target.id.includes("quick-preview-modal") && ($(".quick-preview-modal").removeClass("show"), $("body").removeAttr("style"))
})), document.addEventListener("DOMContentLoaded", (function() {
	$(".pltabs .pltabs-list").length > 0 && pltabsListFunction($(".pltabs .pltabs-list.active").data("id"), $(".view-icon:not(.selected)").data("id"))
})), $(document).on("click", ".pltabs .pltabs-list", (function() {
	var e = $(this).data("id"),
		t = $(".view-icon:not(.selected)").data("id");
	$(this).addClass("active"), $(this).siblings().removeClass("active"), $(e).removeClass("hidden"), $(e).siblings().addClass("hidden"), pltabsListFunction(e, t)
})), $(document).on("click", ".view-icon", (function() {
	var e = $(this).data("id");
	console.log("$id ", e), $(this).removeClass("selected"), $(this).siblings(".view-icon").addClass("selected"), $(e).removeClass("hidden"), $(e).siblings(".views").addClass("hidden")
})), $(document).on("click", ".filter-icon", (function() {
	$(".product-sidebar-content").toggleClass("hidden")
})), $(".plst-close-btn").click((function() {
	$(this).parent().remove()
})), $(".clear-btn").click((function() {
	$(".plst-lists").remove(), $(this).remove()
})), $(document).on("click", ".wishlist_icon", (function() {
	$(this).children(".heart-full").hasClass("hidden") ? ($(this).children(".heart-full").removeClass("hidden"), $(this).children(".heart-hole").addClass("hidden")) : ($(this).children(".heart-full").addClass("hidden"), $(this).children(".heart-hole").removeClass("hidden"))
})), $(document).on("click", ".slider-img img", (function() {
	var e = $(this).data("image"),
		t = $(this).parent().parent().parent().parent().children(".banner-img");
	t.find("img").attr("src");
	t.find("img").attr("src", e), $(this).parent().addClass("active"), $(this).parent().siblings().removeClass("active")
})), $(document).on("change", ".add_on", (function() {
	const e = $(this).prop("checked");
	let t = $(this).attr("data-price"),
		i = $(this).attr("data-original-price");
	const o = i ? isNaN(Number(i)) ? 0 : Number(i) : 0;
	let n = $("#total_amount").val(),
		s = $("#original-price").val();
	const a = s ? isNaN(Number(s)) ? 0 : Number(s) : 0;
	let d, l;
	console.log("original amount", a), 1 == e ? (d = Number(t) + Number(n), l = a + o) : (d = Number(n) - Number(t), l = a - o), console.log(l);
	const r = Number(d).toFixed(2),
		c = d.toLocaleString("en-US", {
			minimumFractionDigits: 2
		}),
		p = l.toFixed(2),
		u = l.toLocaleString("en-US", {
			minimumFractionDigits: 2
		});
	$("#total_amount").val(r), $(".total_amount").text(c), $("#original-price").val(p), $(".original-price").text(u), calculateAverage()
})), $(document).on("click", "#age-check-no", (function() {
	$(this).parent().parent().next().show()
})), $(document).on("click", "#age-check-yes", (function() {
	$(this).parent().parent().next().hide()
})), $(".lr-tabs .lr-tabs-item").length > 0) && (($tabItem = $(".lr-tabs .lr-tabs-item")).first().addClass("active"), changeTab($id = $tabItem.first().data("id")));

function changeTab(e) {
	$(e).removeClass("hidden"), $(e).siblings().addClass("hidden"), "#email-address" != e && "#log-email-address" != e || ($(e).find(".login-with-password-section").addClass("hidden"), $(e).find(".login-with-phone").removeClass("hidden"))
}

function ValidateEmail(e) {
	return !!/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(e)
}

function showPassword(e, t) {
	const i = "password" === event.target.previousElementSibling.getAttribute("type") ? "text" : "password",
		o = "password" === event.target.previousElementSibling.getAttribute("type") ? e : t;
	event.target.previousElementSibling.setAttribute("type", i), event.target.setAttribute("src", o)
}

function codeSubmitShow(e, t, i) {
	$(e).keyup((function(e) {
		var o = this.id;
		if (document.getElementById(o).value.length == document.getElementById(o).getAttribute("maxlength"))
			if (this.classList.add("active"), o !== t) {
				var n = this.nextElementSibling.id;
				document.getElementById(n).focus()
			} else $(".submit-btn").prop("disabled", !1);
		if ("Backspace" === e.key && (this.classList.remove("active"), $(".submit-btn").prop("disabled", !0), o !== i)) {
			var s = this.previousElementSibling.id;
			document.getElementById(s).focus()
		}
	}))
}

function resendLink(e) {
	var t = e;
	downloadTimer = setInterval((function() {
		t <= 0 ? (clearInterval(downloadTimer), $(".countdown").html("00:" + e), $(".countdown").addClass("hidden").removeClass("count-show"), $(".countdown").parent().addClass("hidden"), $(".cus-resend-btn").removeClass("hidden").addClass("stop-clock")) : ($(".countdown").removeClass("hidden").addClass("count-show"), t < 10 ? $(".countdown").html("0" + t) : $(".countdown").html(t)), t -= 1
	}), 1e3)
}($(".lr-tabs-item").click((function(e) {
	e.preventDefault();
	var t = $(this).data("id");
	$(this).addClass("active"), $(this).siblings().removeClass("active"), changeTab(t)
})), $(".lr-popup-close").click((function() {
	($(this).parent().parent().parent().removeClass("flex"), $("body").removeClass("overflow-hidden"), $(this).parent().parent().parent().hasClass("lr-login-with-email-popup")) && ($(".lr-login-with-email-popup .lr-login-tabs .lr-tabs-item").each((function() {
		$(this).removeClass("active")
	})), $tabItem.first().addClass("active"), changeTab($tabItem.first().data("id")))
})), $(document).on("click", ".go-login-btn", (function(e) {
	e.preventDefault(), $(".login-with-phone").addClass("hidden"), $(".login-with-password-section").removeClass("hidden")
})), $(document).on("click", ".go-verification-btn", (function() {
	$(".login-with-phone").removeClass("hidden"), $(".login-with-password-section").addClass("hidden")
})), $(document).on("click", ".forget-password-btn", (function() {
	var e = $(this).data("parent"),
		t = $(this).data("id");
	$("." + e).removeClass("flex"), $(".reset-password-popup").addClass("flex");
	var i = $(".reset-password-popup #" + t);
	i.removeClass("hidden"), i.siblings(".reset-view").addClass("hidden")
})), $(".lr-register-popup").length > 0 && $(".login-with-password-section #reg-password").on("input", (function(e) {
	"" != $(this).val() ? $(".password-login-btn").removeAttr("disabled") : $(".password-login-btn").attr("disabled", "disabled")
})), $("#current-password,#reg-current-password").click((function() {
	showPassword($(this).attr("data-imghide"), $(this).attr("data-imgshow"))
})), $(".lr-successful-popup-close").click((function() {
	$(this).parent().parent().removeClass("flex"), $("body").removeClass("overflow-hidden")
})), $(".ok-btn").click((function() {
	$(".lr-reg-successful-popup").removeClass("flex"), $("body").removeClass("overflow-hidden")
})), codeSubmitShow(".otp-container input", "sixth", "first"), codeSubmitShow(".otp-email-container input", "email-sixth", "email-first"), $(".ph-verification-code-popup .lr-successful-popup-close").click((function() {
	$(this).parent().parent().parent().removeClass("flex")
})), $(document).on("click", ".cus-resend-btn", (function() {
	resendLink(60), $(this).siblings().removeClass("hidden"), $(this).addClass("hidden").removeClass("stop-clock")
})), $(document).on("click", ".ph-go-password-login-btn,.go-login-password-btn", (function() {
	var e = $(this).data("parent"),
		t = $(this).data("id");
	$(".lr-register-popup").addClass("flex"), $(e).removeClass("flex"), clearInterval(downloadTimer), $(".lr-register-popup .lr-tabs .lr-tabs-item[data-id='" + t + "']").addClass("active"), $(".lr-register-popup .lr-tabs .lr-tabs-item[data-id='" + t + "']").siblings().removeClass("active"), changeTab(t), "#phone-number" == t && ($(".lr-register-popup .lr-contents #phone-number").children(".login-with-password-section").removeClass("hidden"), $(".lr-register-popup .lr-contents #phone-number").children(".login-with-phone").addClass("hidden"))
})), $(".lr-login-tabs .lr-tabs-item").length > 0) && (($tabItem = $(".lr-login-tabs .lr-tabs-item")).first().addClass("active"), changeTab($id = $tabItem.first().data("id")));

function closePopupInStock(e) {
	$(e).hide()
}
if ($(document).on("click", ".lr-successful-popup-close", (function() {
		$(this).parent().parent().parent().removeClass("flex"), $("body").removeClass("overflow-hidden")
	})), $(document).on("click", ".lr-popup-back", (function() {
		($(this).parent().parent().parent().removeClass("flex"), $(".lr-register-popup").addClass("flex"), $(this).parent().parent().parent().hasClass("lr-login-with-email-popup")) && ($(".lr-login-with-email-popup .lr-login-tabs .lr-tabs-item").each((function() {
			$(this).removeClass("active")
		})), $tabItem.first().addClass("active"), changeTab($tabItem.first().data("id")))
	})), $(document).on("click", ".reset-via-email-btn", (function() {
		$("#phone-number-reset").addClass("hidden"), $("#phone-number-reset").siblings(".reset-view").removeClass("hidden")
	})), $(document).on("click", ".reset-via-phone-btn", (function() {
		$("#email-reset").addClass("hidden"), $("#email-reset").siblings(".reset-view").removeClass("hidden")
	})), $(document).on("keyup", 'input[name="reset-phone-number"]', (function() {
		"" != $(this).val() ? $(".send-code-btn").prop("disabled", !1) : $(".send-code-btn").prop("disabled", !0)
	})), $(document).on("keyup", 'input[name="reset-email"]', (function() {
		"" != $(this).val() ? $(".get-verification-btn").prop("disabled", !1) : $(".get-verification-btn").prop("disabled", !0)
	})), $(document).on("click", ".instock-remainder-popup-close", (function() {
		$(".instock-remainder-popup").hide(), $("body").css("overflow", "auto")
	})), $(document).on("click", ".inStock-remainder-btn", (function() {
		$(".instock-remainder-popup").show(), $("body").css("overflow", "hidden")
	})), $(".me-coupon-category-tabs").length > 0) {
	if (window.location.href.indexOf("coupon-list") > -1) {
		$(".clmaintabs-item:eq(0)").addClass("active");
		var $div = $(".clmaintabs-item:eq(0)").data("id");
		$($div).removeClass("hidden");
		var $leftside = $(".clinnertabs-item:eq(0)").data("id");
		$('.clinnertabs-item[data-id="' + $leftside + '"]').length > 0 ? $('.clinnertabs-item[data-id="' + $leftside + '"]').each((function() {
			$(this).addClass("active")
		})) : $(".clinnertabs-item:eq(0)").addClass("active"), $($leftside).removeClass("hidden"), $(".inner-views.mra .small-coupon.new-small-coupon:eq(0)").addClass("show")
	}
	$(document).on("click", ".coupon-see-detail", (function() {
		var e = $(this).data("id");
		$(this).parent().parent().parent().parent().parent().parent().addClass("show"), $(this).parent().parent().parent().parent().parent().parent().siblings(".small-coupon.new-small-coupon").removeClass("show");
		var t = $(".right-side " + e);
		t.removeClass("hidden"), t.siblings().addClass("hidden"), $(".detail-arrow").removeClass("notshow")
	})), $(document).on("click", ".clmaintabs-item", (function() {
		var e = $(this).data("id");
		$(".clmaintabs-item[data-id='" + e + "']").each((function() {
			$(this).addClass("active"), $(this).siblings().removeClass("active")
		})), $(".cc-views" + e).length > 0 ? ($(".cc-views" + e).removeClass("hidden"), $(".cc-views" + e).siblings().addClass("hidden")) : $(".cc-views").addClass("hidden"), $(".detail-item").addClass("hidden"), $(".detail-arrow").addClass("notshow")
	})), $(document).on("click", ".clinnertabs-item", (function() {
		var e = $(this).data("id");
		$(".detail-item").addClass("hidden"), $(".detail-arrow").addClass("notshow"), $(".clinnertabs-item[data-id='" + e + "']").each((function() {
			$(this).addClass("active"), $(this).siblings().removeClass("active")
		})), $(".inner-views" + e).length > 0 ? $(e).each((function() {
			$(this).removeClass("hidden"), $(this).siblings().addClass("hidden")
		})) : $(".inner-views").addClass("hidden")
	})), $(".group-merchant").each((function() {
		$(this).find(".small-coupon.new-small-coupon").length < 3 && $(this).css({
			height: "auto"
		})
	}))
}
$(document).on("click", ".cp-detail-collect-btn", (function() {
	var e = $(this).data("id");
	$(this).text("Collected"), $(this).addClass("collected"), $("#" + e + " .small-coupon--container").children().removeClass("collect").addClass("collected"), $("#" + e + " .small-coupon--container").children().children(".gccard").removeClass("collect").addClass("collected")
})), $(document).on("click", ".me-go-password-login-btn ", (function() {
	var e = $(this).data("parent"),
		t = $(this).data("id");
	$(".lr-login-with-email-popup").addClass("flex"), $(e).removeClass("flex"), $(".lr-login-with-email-popup .lr-login-tabs .lr-tabs-item[data-id='" + t + "']").addClass("active"), $(".lr-login-with-email-popup .lr-login-tabs .lr-tabs-item[data-id='" + t + "']").siblings().removeClass("active"), changeTab(t), "#log-email-address" == t && ($(".lr-login-with-email-popup .lr-contents #log-email-address").children(".login-with-password-section").addClass("hidden"), $(".lr-login-with-email-popup .lr-contents #log-email-address").children(".login-with-phone").removeClass("hidden"))
})), $(document).on("click", ".ok-btn", (function() {
	$(this).parent().parent().parent().removeClass("flex")
})), 0 == $(".four-card-div .ccs-card").length ? ($(".four-card-div").css({
	"justify-content": "center"
}), $("#pcpw-container").css({
	"justify-content": "center"
})) : ($(".four-card-div").removeAttr("style"), $("#pcpw-container").removeAttr("style")), $(document).on("click", ".card-delete-btn", (function() {
	$(this).parent().remove()
})), $(document).ready((function() {
	function e() {
		$(".compare-plus-card").each((function() {
			$(this).siblings().length > 0 ? function(e) {
				var t = 0;
				for (i = 0; i < $("." + e).length && $("." + e).eq(i); i++) {
					var o = $("." + e).eq(i).height();
					o >= t && (t = o)
				}
				$("." + e).siblings(".compare-plus-card").height(t)
			}($(this).siblings().attr("class").split(" ")[0]) : $(this).parent().hasClass("four-card-div") && $(".four-card-div .compare-plus-card").css({
				height: "394px"
			})
		}))
	}
	e(), $(window).resize((function() {
		e()
	})), $(document).on("click", ".complus-btn", (function() {
		var e = $(this).data("compare-id");
		$("#" + e).removeClass("hidden"), $("#" + e).addClass("flex"), $("body").addClass("overflow-hidden")
	}))
})), $(document).on("click", ".me-custom-collpase-title-bar", (function(e) {
	$(this).next().find(".me-custom-collpase-info").toggleClass("collpase-content-hide"), $(this).next().find(".me-custom-collpase-detail-table").toggleClass("collpase-content-hide"), window.innerWidth < 640 && $(this).next().find(".me-custom-collpase-detail-mobile").toggleClass("collpase-content-hide"), $(this).toggleClass("show-dropdown")
})), $(document).on("click", ".collpase-all-btn", (function() {
	window.innerWidth > 640 ? $(".me-custom-collpase-detail-table").hasClass("collpase-content-hide") ? ($(".me-custom-collpase-info").addClass("collpase-content-hide"), $(".me-custom-collpase-detail-table").removeClass("collpase-content-hide"), window.innerWidth < 640 && ($(".me-custom-collpase-detail-table").addClass("collpase-content-hide"), $(".me-custom-collpase-detail-mobile").removeClass("collpase-content-hide")), $(".me-custom-collpase-title-bar").removeClass("show-dropdown")) : ($(".me-custom-collpase-info").removeClass("collpase-content-hide"), $(".me-custom-collpase-detail-table").addClass("collpase-content-hide"), window.innerWidth < 640 && $(".me-custom-collpase-detail-mobile").addClass("collpase-content-hide"), $(".me-custom-collpase-title-bar").addClass("show-dropdown")) : $(".me-custom-collpase-detail-mobile").hasClass("collpase-content-hide") ? ($(".me-custom-collpase-info").addClass("collpase-content-hide"), $(".me-custom-collpase-detail-table").removeClass("collpase-content-hide"), window.innerWidth < 640 && ($(".me-custom-collpase-detail-table").addClass("collpase-content-hide"), $(".me-custom-collpase-detail-mobile").removeClass("collpase-content-hide")), $(".me-custom-collpase-title-bar").removeClass("show-dropdown")) : ($(".me-custom-collpase-info").removeClass("collpase-content-hide"), $(".me-custom-collpase-detail-table").addClass("collpase-content-hide"), window.innerWidth < 640 && $(".me-custom-collpase-detail-mobile").addClass("collpase-content-hide"), $(".me-custom-collpase-title-bar").addClass("show-dropdown"))
})), $(".me-custom-collpase").scroll((function() {
	setCollpaseWidth()
})), $(window).on("load", (function() {
	setCollpaseWidth(), setServiceTabWidth()
}));
var orgWidth = 0;

function setCollpaseWidth() {
	window.innerWidth < 640 ? ($(".me-custom-collpase-title-bar").each((function(e) {
		$(this).css("width", window.innerWidth - 28 + "px")
	})), $(".description-text").css("width", window.innerWidth - 28 + "px"), $(".collpase-all-btn").css("width", window.innerWidth - 28 + "px")) : ($(".description-text").css("width", "100%"), $(".collpase-all-btn").css("width", "auto"), $(".me-custom-collpase-title-bar").css("width", "100%"))
}

function setServiceTabWidth() {
	window.innerWidth < 571 ? (console.log("571"), $(".sticky-header").each((function(e) {
		$(this).css("width", window.innerWidth - 35 + "px")
	}))) : window.innerWidth < 999 ? (console.log("999"), $(".sticky-header").each((function(e) {
		$(this).css("width", window.innerWidth - 39 + "px")
	}))) : window.innerWidth < 1025 ? (console.log("1025"), $(".sticky-header").each((function(e) {
		$(this).css("width", window.innerWidth - 100 + "px")
	}))) : $(".sticky-header").css("width", "100%")
}

function bindCanderMarkersTags(e) {
	var t = $(".cancer-markers-selected-id").val();
	if (e) {
		for (var i = 0; i < e?.length; i++) $('.markers-tags[data-value="' + e[i] + '"]').addClass("selected");
		bindCancersMarkerCount(t, e)
	}
}

function bindAddsonChecklist() {
	var e = $(".addson-selected-id").val();
	$('input[name="addson-checklist-' + e + '"]:checked').removeAttr("checked"), $('input[name="addson-checklist-' + e + '"]:checked').prop("checked", !1);
	$(".addson-show-detail-" + e).hasClass("hidden");
	var t = $(".adds-on-checklist-detail" + e + " li").map((function() {
		if (null != $(this).data("text")) return {
			id: $(this).data("value"),
			title: $(this).data("text"),
			original_price: $(this).data("price"),
			discount_price: $(this).attr("data-discount") ? $(this).attr("data-discount") : 0
		}
	})).get();
	$(".addson-checklist-" + e).val(JSON.stringify(t)), $('input[name="addson-checklist' + e + '"]').map((function() {
		this.checked = !1, $(this).removeAttr("checked")
	}));
	var i = $(".addson-checklist-" + e).val(),
		o = [];
	"" != i && null != i && "[{" !== i && (o = JSON.parse(i)), console.log("selectedChecklist ", o);
	for (var n = 0; n < o.length; n++) $('li[data-value="' + o[n].id + '"] input').prop("checked", !0)
}
$(window).on("resize", (function() {
	var e = window.innerWidth;
	orgWidth != e && (setCollpaseWidth(), setServiceTabWidth(), orgWidth = e)
})), $(".inner-div").scroll((function() {
	setServiceTabWidth()
})), $(document).on("change", ".select-package", (function() {
	const e = $(this).prop("checked");
	let t = 0,
		i = 0;
	$(".select-package").each((function() {
		if ($(this).prop("checked")) {
			const e = $(this).attr("data-price");
			t += e ? isNaN(Number(e)) ? 0 : Number(e) : 0;
			const o = $(this).attr("data-discount");
			i += o ? isNaN(Number(o)) ? 0 : Number(o) : 0
		}
	}));
	const o = $("input[type=checkbox].add_on:checked"),
		n = $("#total_amount");
	let s = 0;
	if (o.each((function() {
			s += Number($(this).data("price"))
		})), e) {
		if (i) {
			const e = Number(i + s).toFixed(2),
				o = Number(e).toLocaleString("en-US", {
					minimumFractionDigits: 2
				}),
				a = Number(t).toFixed(2),
				d = Number(a).toLocaleString("en-US", {
					minimumFractionDigits: 2
				});
			console.log(e, o), n.val(e), $(".total_amount").text(o), $("#original-price").val(a), $(".original-price").text(`$${d}`)
		} else {
			const e = Number(t + s).toFixed(2),
				i = Number(e).toLocaleString("en-US", {
					minimumFractionDigits: 2
				});
			n.val(e), $(".total_amount").text(`${i}`)
		}
		calculateAverage()
	}
})), $(document).on("click", ".showDropdown-btn", (function() {
	$(this).parent().parent().parent().next().toggleClass("hidden"), $(this).toggleClass("active")
})), $(document).on("click", ".custom-remark-title", (function() {
	var e = $(this).data("id"),
		t = $(this).data("recipient_area_id");
	$(".recipient_area_id").val(t), showTimePopup(e);
	var i = $("html").attr("lang");
	renderCheckoutCalendar(e, i || "en-us")
})), $(document).on("click", ".custom-cancer-markers-remark-title", (function() {
	var e = $(this).data("id");
	$(".cancer-markers-selected-id").val(e);
	$(".cancerMarkers-selected-tags" + e).val()?.split(",");
	var t = $(".cancerMarkers-selected-tags-ids-" + e).val();
	$(".markers-tags.selected").removeClass("selected"), showCancerMarkersPopup(e), console.log("ids ", t), bindCanderMarkersTags(t), $(".cancer-markers-selected-id").val(e)
})), $(document).on("click", ".custom-addson-remark-title", (function() {
	var e = $(this).data("id");
	$(".addson-selected-id").val(e), bindAddsonChecklist(), showAddsOnPopup(e)
})), $(document).on("click", ".edit-btn", (function() {
	var e = $(this).data("id"),
		t = $(this).data("recipient_area_id");
	$(".recipient_area_id").val(t), showTimePopup(e);
	var i = $("html").attr("lang");
	renderCheckoutCalendar(e, i || "en-us")
})), $(document).on("click", ".cancer-markers-edit-btn", (function() {
	var e = $(this).data("id");
	$(".cancer-markers-selected-id").val(e), hideEditBookingPopup($(this).data("parentid"));
	$(".cancerMarkers-selected-tags" + e).val().split(",");
	var t = $(".cancerMarkers-selected-tags-ids-" + e).val().split(",");
	$(".markers-tags.selected").removeClass("selected"), showCancerMarkersPopup(e), bindCanderMarkersTags(t), $(".cancer-markers-selected-id").val(e)
})), $(document).on("click", ".addons-edit-btn", (function() {
	var e = $(this).data("id");
	$(".addson-selected-id").val(e), bindAddsonChecklist(), showAddsOnPopup(e)
})), $(document).on("click", ".me-checkout-merchant-list-container .remove-btn", (function() {
	var e = $(this).data("id"),
		t = $(".item-data-price-" + e).val(),
		i = $(".summary-card-total-price").val(),
		o = parseFloat(changeCurrencyToInt(i)) - parseFloat(changeCurrencyToInt(t));
	$(".summary-card-total-price").text(floatToCurrency(o)), $(".summary-last-total").text(floatToCurrency(o)), $(".summary-card-total-price").val(o), $(this).parent().parent().parent().addClass("hidden"), $(".me-checkout-merchant-content-card-" + e).addClass("hidden"), $(".card-list.card-list-index-" + e).addClass("hidden")
})), $(document).on("click", ".remove-custom-btn", (function() {
	$(this).parent().next().addClass("hidden"), $(this).parent().addClass("hidden")
}));
const couponPopupBtn = document.querySelector("#coupon-popup-close-btn"),
	couponPopup = document.querySelector("#coupon-popup"),
	notiOnBtn = document.querySelector("#noti-on-btn"),
	notiOnModal = document.querySelector(".noti-on"),
	notiCloseBtn = document.querySelector("#noti-on-close-btn"),
	modalButton = document.querySelector("#modalButton");
if (couponPopup) {
	couponPopupBtn.addEventListener("click", (() => {
		couponPopup.classList.add("hidden")
	})), notiOnBtn.addEventListener("click", (() => {
		document.body.style.overflowY = "hidden", notiOnModal.showModal()
	}));
	const t = () => {
		document.body.style.overflowY = "auto", notiOnModal.close()
	};
	notiCloseBtn.addEventListener("click", t), modalButton.addEventListener("click", t), notiOnModal.addEventListener("click", (e => {
		const t = notiOnModal.getBoundingClientRect();
		(e.clientX < t.left || e.clientX > t.right || e.clientY < t.top || e.clientY > t.bottom) && (notiOnModal.close(), document.body.style.overflowY = "auto")
	})), document.addEventListener("keydown", (e => {
		"Escape" === e.key && (document.body.style.overflowY = "auto")
	}))
}

function stickyCardWidth() {
	var e = $(".ccs-card:eq(0)").innerWidth();
	$(".sticky-compare-bar .sticky-card").each((function() {
		$(this).css({
			width: e + "px"
		})
	}))
}
$(".compare-card-section").length > 0 && stickyCardWidth(), $(window).resize((function() {
	stickyCardWidth()
}));
var stickyTargetDiv = $(".sticky-compare-bar .inner-div"),
	compareTargetDiv = $(".compare-list-section .inner-div");

function divScroll(e, t) {
	e.scroll((function() {
		$(this).scrollLeft();
		t.prop("scrollTop", this.scrollTop).prop("scrollLeft", this.scrollLeft)
	}))
}

function confirmCancerMakers(e) {
	var t = $(".cancer-markers-selected-id").val(),
		i = ($(".cancerMarkers-selected-tags" + t).val()?.split(",")?.filter((e => "" != e)), $(".cancerMarkers-selected-tags-ids-" + t).val()?.split(",")?.filter((e => "" != e))),
		o = "";
	if (i.length > 0) {
		for (var n = 0; n < i.length; n++) {
			o += '<li class="flex items-center mt-2">\n            <span class="mr-4 font-normal me-body-18 text-darkgray">' + $('.markers-tags[data-value="' + i[n] + '"]').attr("data-text") + "</span>\n        </li>"
		}
		$(".cancer-markers-placeholder" + t).addClass("hidden"), $(".cancer-markers-detail-data" + t).removeClass("hidden"), $(".detail-data-list" + t).removeClass("hidden")
	} else $(".cancer-markers-placeholder" + t).removeClass("hidden"), $(".cancer-markers-detail-data" + t).addClass("hidden"), $(".detail-data-list" + t).addClass("hidden");
	$(".cancerMarkers-detail-data" + t).html(o), hideCancerMarkersPopup(e);
	var s = $('input[name="cancer-markers-decide-later-' + e + '"]').prop("checked");
	$(".cancerMarkers-decidelater-" + e).val(s), bindCancersMarkerCount(e, i)
}

function showTimePopup(e) {
	$(".preferred-time-popup-" + e).removeClass("hidden"), $("body").css("overflow", "hidden")
}

function hideTimePopup(e) {
	$(".preferred-time-popup-" + e).addClass("hidden"), $("body").css("overflow", "")
}

function showCancerMarkersPopup(e) {
	$(".me-checkout-cancer-markers-popup-" + e).removeClass("hidden"), $("body").css("overflow", "hidden")
}

function hideCancerMarkersPopup(e) {
	$(".me-checkout-cancer-markers-popup-" + e).addClass("hidden"), $("body").css("overflow", "")
}

function showAddsOnPopup(e) {
	$(".me-checkout-addson-popup-" + e).removeClass("hidden"), $("body").css("overflow", "hidden")
}

function hideAddsOnPopup(e) {
	$(".me-checkout-addson-popup-" + e).addClass("hidden"), $("body").css("overflow", "")
}

function initialCancerMarkers() {
	$(".cancerMarkers-selected-tags").each((function() {
		var e = $(this).data("id"),
			t = ($(".cancerMarkers-selected-tags" + e).val()?.split(",")?.filter((e => "" != e)), $(".cancerMarkers-selected-tags-ids-" + e).val()?.split(","));
		console.log("selectedItemsIds ", t);
		var i = $(".cancerMarkers-decidelater-" + e).val(),
			o = "";
		if (t)
			if (t.length > 0) {
				$(".cancer-markers-placeholder" + e).addClass("hidden"), $(".cancer-markers-detail-data" + e).removeClass("hidden"), $(".detail-data-list" + e).hasClass("defaultShow") || $(".detail-data-list" + e).removeClass("hidden");
				for (var n = 0; n < t.length; n++) {
					if ("" !== t[n]) o += '<li class="flex items-center mt-2">\n                        <span class="mr-4 font-normal me-body-18 text-darkgray">' + $(".me-checkout-cancer-markers-popup-" + e + ' .markers-tags[data-value="' + t[n] + '"]').attr("data-text") + "</span>\n                    </li>"
				}
			} else $(".cancer-markers-placeholder" + e).removeClass("hidden"), $(".cancer-markers-detail-data" + e).addClass("hidden");
		else $(".cancer-markers-placeholder" + e).removeClass("hidden"), $(".cancer-markers-detail-data" + e).addClass("hidden");
		$(".cancerMarkers-detail-data" + e).html(o), $('input[name="cancer-markers-decide-later-' + e + '"]').prop("checked", "true" == i), bindCancersMarkerCount(e, t)
	}))
}

function bindCancersMarkerCount(e, t) {
	t.length;
	var i = $(".me-checkout-cancer-markers-popup-" + e + " .markers-tags:nth-child(1)").data("total"),
		o = 0;
	$(".me-checkout-cancer-markers-popup-" + e + " .markers-tags").each((function() {
		var e = $(this).data("value");
		t.includes(e?.toString()) && (o += parseInt($(this).data("count")))
	})), $(".cancer-markers-selected-value-" + e).text(o + "/" + i), $(".selected-cancermarkers-count-" + e).text(o + "/" + i)
}

function confirmAddsonItems(e) {
	$(".addson-selected-id").data("parentid");
	var t = $('input[name="addson-checklist-' + e + '"]:checked').map((function() {
		return {
			name_en: this.parentElement.parentElement.parentElement.getAttribute("data-text"),
			original_price: this.parentElement.parentElement.parentElement.getAttribute("data-price"),
			discount_price: this.parentElement.parentElement.parentElement.getAttribute("data-discount"),
			id: this.parentElement.parentElement.parentElement.getAttribute("data-value")
		}
	})).get();
	$('input[name="addson-noaddition-' + e + '"]').prop("checked");
	$(".addson-checklist-" + e).val(t ? JSON.stringify(t) : null), showSelectedAddsOnList(t, e), t.length > 0 ? ($(".addson-placeholder-" + e).addClass("hidden"), $(".addson-placeholder-" + e).removeClass("flex"), $(".addson-show-detail-" + e).removeClass("hidden"), $(".addson-detail-list-" + e).hasClass("defaultShow") || $(".addson-detail-list-" + e).removeClass("hidden")) : ($(".addson-placeholder-" + e).removeClass("hidden"), $(".addson-placeholder-" + e).addClass("flex"), $(".addson-show-detail-" + e).addClass("hidden"), $(".addson-detail-list-" + e).addClass("hidden")), $(".checkout-price-summary-" + e).text(calculateAddsOnPrice(t));
	var i = $(".data-card-items-" + e).data("parentid"),
		o = $(".item-data-price-" + i).data("price"),
		n = 0;
	o && (n = changeCurrencyToInt(o));
	var s = getAllPriceAddson(e, n);
	$(".item-data-price-" + i).text(s), $(".item-data-price-" + i).val(s), hideAddsOnPopup(e), bindAddsOnCount(e, t.length), updateSummaryPrice();
	var a = $(".addson-noaddition-" + e).prop("checked");
	$(".addson-checklist-decideLater-" + e).val(a)
}

function showSelectedAddsOnList(e, t) {
	for (var i = "", o = 0; o < e.length; o++) {
		var n = null != e[o].discount_price && 0 != e[o].discount_price ? e[o].discount_price : e[o].original_price;
		i += '<li data-value="' + e[o].id + '" data-text="' + e[o].name_en + '" data-discount="' + e[o].discount_price + '" data-price="' + e[o].original_price + '" class="flex items-center mt-2">\n        <span class="mr-4 font-normal me-body-18 text-darkgray">' + e[o].name_en + '</span>\n        <span class="font-normal me-body-18 text-darkgray">' + floatToCurrency(n) + "</span>\n    </li>"
	}
	$(".adds-on-checklist-detail" + t).html(i)
}

function changeCurrencyToInt(e) {
	return e?.toString().replace("+", "")?.replace(/[^0-9.-]+/g, "")
}

function initialAddsonItems() {
	$(".addson-checklist").each((function() {
		var e = "@@id" == $(this).data("id") ? "" : $(this).data("id"),
			t = $(".data-card-items-" + e).data("parentid"),
			i = $('.data-card-items[data-parentid="' + t + '"]').length,
			o = $(this).val(),
			n = $(".addson-checklist-decideLater-" + e).val();
		if (i > 1) {
			if ("[{" !== o && "[]" != o && "" != o) {
				for (var s = JSON.parse(o), a = "", d = 0; d < s.length; d++) {
					var l = $(".me-checkout-addson-popup-" + e + ' li[data-value="' + s[d].id + '"]').attr("data-text"),
						r = null != s[d].discount_price && 0 != s[d].discount_price ? s[d].discount_price : s[d].original_price;
					a += '<li data-value="' + s[d].id + '" data-text="' + s[d].name_en + '" data-discount="' + s[d].discount_price + '" data-price="' + s[d].original_price + '" class="flex items-center mt-2">\n            <span class="mr-4 font-normal me-body-18 text-darkgray">' + l + '</span>\n            <span class="font-normal me-body-18 text-darkgray">' + r + "</span>\n        </li>"
				}
				s.length > 0 ? ($(".addson-placeholder-" + e).addClass("hidden"), $(".addson-placeholder-" + e).removeClass("flex"), $(".addson-show-detail-" + e).removeClass("hidden"), $(".addson-detail-list-" + e).hasClass("defaultShow") || $(".addson-detail-list-" + e).removeClass("hidden")) : ($(".addson-placeholder-" + e).removeClass("hidden"), $(".addson-placeholder-" + e).addClass("flex"), $(".addson-show-detail-" + e).addClass("hidden"), $(".addson-detail-list-" + e).addClass("hidden")), $(".adds-on-checklist-detail" + e).html(a);
				var c = 0;
				(u = $(".item-data-price-" + t).data("price")) && (c = changeCurrencyToInt(u));
				var p = getAllPriceAddson(e, parseFloat(c));
				$(".item-data-price-" + t).text(p), $(".item-data-price-" + t).val(p), bindAddsOnCount(e, s.length)
			}
		} else if ("[{" !== o && "[]" != o && "" != o) {
			for (s = JSON.parse(o), a = "", d = 0; d < s.length; d++) {
				l = $(".me-checkout-addson-popup-" + e + ' li[data-value="' + s[d].id + '"]').attr("data-text"), r = 0 != s[d].discount_price && null != s[d].discount_price ? s[d].discount_price : s[d].original_price;
				a += '<li data-value="' + s[d].id + '" data-text="' + s[d].name_en + '" data-discount="' + s[d].discount_price + '"  data-price="' + s[d].original_price + '" class="flex items-center mt-2">\n            <span class="mr-4 font-normal me-body-18 text-darkgray">' + l + '</span>\n            <span class="font-normal me-body-18 text-darkgray">' + floatToCurrency(r) + "</span>\n        </li>"
			}
			s.length > 0 ? ($(".addson-placeholder-" + e).addClass("hidden"), $(".addson-placeholder-" + e).removeClass("flex"), $(".addson-show-detail-" + e).removeClass("hidden"), $(".addson-detail-list-" + e).hasClass("defaultShow") || $(".addson-detail-list-" + e).removeClass("hidden")) : ($(".addson-placeholder-" + e).removeClass("hidden"), $(".addson-placeholder-" + e).addClass("flex"), $(".addson-show-detail-" + e).addClass("hidden"), $(".addson-detail-list-" + e).addClass("hidden")), $(".adds-on-checklist-detail" + e).html(a);
			c = 0;
			(u = $(".item-data-price-" + t).data("price")) && (c = changeCurrencyToInt(u));
			p = getAllPriceAddson(e, parseFloat(c));
			$(".item-data-price-" + t).text(p), $(".item-data-price-" + t).val(p), bindAddsOnCount(e, s.length)
		} else {
			$(".addson-placeholder-" + e).removeClass("hidden"), $(".addson-placeholder-" + e).addClass("flex"), $(".addson-show-detail-" + e).addClass("hidden"), $(".addson-detail-list-" + e).addClass("hidden");
			var u;
			c = 0;
			(u = $(".item-data-price-" + t).data("price")) && (c = changeCurrencyToInt(u));
			p = getAllPriceAddson(e, parseFloat(c));
			i <= 1 && ($(".item-data-price-" + t).text(p), $(".item-data-price-" + t).val(p))
		}
		$('input[name="addson-noaddition-' + e + '"]').prop("checked", "true" == n)
	})), updateSummaryPrice()
}

function calculateAddsOnPrice(e, t) {
	let i = t ? parseInt(t) : 0;
	for (var o = 0; o < e.length; o++) {
		if (0 != e[o].discount_price && "" != e[o].discount_price && null != e[o].discount_price) i += Number(e[o].discount_price?.replace("+", "")?.replace(/[^0-9.-]+/g, ""));
		else i += Number(e[o].original_price?.replace("+", "")?.replace(/[^0-9.-]+/g, ""))
	}
	return i.toLocaleString("en-US", {
		style: "currency",
		currency: "USD"
	})
}

function bindAddsOnCount(e, t) {
	$(".adds-on-total-count-" + e).val();
	$(".selected-addson-count-" + e).text(t), $(".selected-addson-" + e).text("x" + t)
}

function getAllPriceAddson(e, t) {
	for (var i = $(".data-card-items-" + e).data("parentid"), o = $('.data-card-items[data-parentid="' + i + '"]'), n = [], s = t ? parseFloat(t) : 0, a = 0; a < o.length; a++) {
		var d = o[a].dataset.id;
		if ("[{" !== $(".addson-checklist-" + d).val() && "[]" !== $(".addson-checklist-" + d).val() && "" !== $(".addson-checklist-" + d).val()) {
			var l = JSON.parse($(".addson-checklist-" + d).val());
			n = [...n, ...l]
		}
		var r = $(".packages-items-price-" + d).val(),
			c = $(".packages-items-discountprice-" + d).val();
		null != r && null != c && (s += 0 != c || null != c ? parseFloat(changeCurrencyToInt(c)) : parseFloat(changeCurrencyToInt(r)))
	}
	var p = s.toString()?.replace("+", "")?.replace(/[^0-9.-]+/g, "");
	return calculateAddsOnPrice(n, p)
}

function floatToCurrency(e) {
	return e.toLocaleString("en-US", {
		style: "currency",
		currency: "USD"
	})
}

function updateSummaryPrice() {
	var e = 0;
	$(".available-card input.item-data-price").each((function() {
		$(this).data("price"), $(this).val();
		e += parseFloat($(this).val() ? changeCurrencyToInt($(this).val()) : 0)
	})), $(".summary-card-total-price").text(floatToCurrency(e)), $(".summary-card-total-price").val(floatToCurrency(e)), $(".summary-last-total").text(floatToCurrency(e))
}

function showCouponPopup() {
	$("#me-coupon-popup").removeClass("hidden"), $("body").addClass("overflow-hidden")
}

function hideCouponPopup() {
	$("#me-coupon-popup").addClass("hidden"), $("body").removeClass("overflow-hidden")
}

function inputPromoCode() {
	$(".before-choose-coupon").removeClass("hidden"), $(".after-choose-coupon").addClass("hidden"), $(".promo-code-text").text(""), $(".promo-code").val(""), $(".use-promo-code-btn-input-text").removeClass("hidden"), $(".use-promo-code-btn").addClass("hidden")
}

function bookNowBtnEvent() {
	$(".me-checkout-merchant-list-container .unavailable-card");
	var e = !0,
		t = !0,
		i = !0;
	return $(".available-card .checkout-data-location-id").each((function() {
		if (0 == checkIsValidate($(this).val())) {
			var t = $(this).data("id");
			e = checkPreferredTimeDecideLater(t)
		}
	})), $(".available-card .checkout-data-location-date").each((function() {
		if (0 == checkIsValidate($(this).val())) {
			var e = $(this).data("id");
			t = checkPreferredTimeDecideLater(e)
		}
	})), $(".available-card .checkout-data-location-time").each((function() {
		if (0 == checkIsValidate($(this).val())) {
			var e = $(this).data("id");
			checkPreferredTimeDecideLater(e)
		}
	})), $(".available-card .cancerMarkers-selected-tags").each((function() {
		var e = $(this).data("id");
		if (0 == checkIsValidate($(this).val())) i = checkCancerMarkerDecideLater(e);
		else {
			var t = $(".cancer-markers-min-selected-" + e).val(),
				o = $(this).val()?.split(",").length;
			o < t && (i = checkCancerMarkerDecideLater(e))
		}
	})), console.log("isChooseAddsOn ", e, t, i, !0), i && e && t
}

function checkPreferredTimeDecideLater(e) {
	var t = $(".preferred-time-popup-" + e + ' input[name="decide-later-' + e + '"]').prop("checked");
	return t || !1
}

function checkCancerMarkerDecideLater(e) {
	return $(".me-checkout-cancer-markers-popup-" + e + ' input[name="decide-later' + e + '"]').prop("checked")
}

function checkAddsOnDecideLater(e) {
	return $(".me-checkout-addson-popup-" + e + ' input[name="addson-noaddition-' + e + '"]').prop("checked")
}

function checkIsValidate(e) {
	if ("" == e || null == e || null == e) return !1
}

function getValues() {
	var e = {
		preferredData: [],
		cancerMarkers: [],
		addsOn: []
	};
	document.querySelectorAll(".checkout-data-location").forEach((t => {
		var i = t.getAttribute("data-id").trim(""),
			o = $(".checkout-location" + i).val(),
			n = $(".checkout-date" + i).val(),
			s = $(".checkout-time" + i).val();
		e.preferredData.push({
			id: i,
			locationName: o,
			date: n,
			time: s
		})
	})), document.querySelectorAll(".cancerMarkers-selected-tags").forEach((t => {
		var i = t.getAttribute("data-id").trim(""),
			o = $(".cancerMarkers-selected-tags" + i).val();
		e.cancerMarkers.push({
			id: i,
			value: o
		})
	})), document.querySelectorAll(".addson-checklist").forEach((t => {
		var i = t.getAttribute("data-id").trim(""),
			o = $(".cancerMarkers-selected-tags" + i).val();
		e.addsOn.push({
			id: i,
			value: o
		})
	}))
}

function showLoading() {
	$("#me-checkout-complete-loading").addClass("show"), $("body").addClass("overflow-hidden")
}

function hideLoading() {
	$("#me-checkout-complete-loading").removeClass("show"), $("body").removeClass("overflow-hidden")
}

function wishListTabs(e) {
	$(".me-dashboard-content " + e).removeClass("hidden"), $(".me-dashboard-content " + e).siblings().addClass("hidden");
	var t = e.replace(/#/g, "");
	$(".me-dashboard-innercontent").each((function() {
		$(this).attr("data-id") == t ? $(this).removeClass("hidden") : $(this).addClass("hidden")
	}))
}

function changePlaceholder() {
	selectedTextarea = $(".redeem-coupon-layer input")[0], selectedTextarea.placeholder = "", $(".error-icon").removeClass("hidden")
}

function compareStatusAutoClose() {
	setTimeout((function() {
		$(".csp-container").addClass("hidden")
	}), 3e3)
}

function bindInputFieldOnDropdown(e, t) {
	$('input[name="checkout-gender-' + e + '"][value="' + t.gender + '"]').prop("checked", !0), $(".contact-info-lastname-" + e).val(t.lastname), $(".contact-info-firstname-" + e).val(t.firstname), $(".contact-info-countrycode-" + e).val(t.countryCode), $(".contact-info-countrycode-" + e).text(t.countryCode), $(".contact-info-phno-" + e).val(t.phone)
}

function showRequestPopup() {
	$("#me-checkout-special-request-popup").removeClass("hidden")
}

function hideRequestPopup() {
	$("#me-checkout-special-request-popup").addClass("hidden")
}

function clearContactEditCard(e) {
	$("#checkout-male-rdo-" + e).prop("checked", !0), $("#checkout-female-rdo-" + e).prop("checked", !1), $(".contact-info-lastname-" + e).val(""), $(".contact-info-firstname-" + e).val(""), $(".contact-info-countrycode-" + e).val($(".country-code-list li:first-child").data("text")), $(".contact-info-countrycode-" + e).text($(".country-code-list li:first-child").data("text")), $(".contact-info-phno-" + e).val("")
}

function disabledSaveButton() {
	$(".me-checkout-contact-info-edit-container input").each((function() {
		var e = $(this).data("id"),
			t = $(".contact-info-lastname-" + e).val(),
			i = $(".contact-info-firstname-" + e).val();
		$(".contact-info-phno-" + e).val();
		checkIsValid(t) && checkIsValid(i) ? $('input[name="save-credit-card-' + e + '"]').prop("disabled", !1) : ($('input[name="save-credit-card-' + e + '"]').prop("disabled", !0), $('input[name="save-credit-card-' + e + '"]').attr("disabled", !0))
	}))
}

function checkIsValid(e) {
	return "" != e && null != e && null != e
}

function changeCouponTab(e) {
	var t = e;
	$(".mdinner-view" + t).removeClass("hidden"), $(".mdinner-view" + t).siblings().addClass("hidden")
}

function showPackagePopup(e) {
	$(".me-checkout-packages-popup-" + e).removeClass("hidden"), $("body").css("overflow", "hidden")
}

function hidePackagePopup(e) {
	$(".me-checkout-packages-popup-" + e).addClass("hidden"), $("body").css("overflow", "")
}

function bindSelectedPackage(e, t, i, o, n) {
	var s = `<li data-value="${t}" data-text="` + o + `" data-price="${i}" class="flex items-center mt-2">\n        <span class="mr-4 font-normal me-body-18 text-darkgray">${o}</span>\n        <span class="font-normal me-body-18 text-darkgray">${n||i}</span>\n    </li>`;
	$(".packages-detail-" + e).html(s)
}

function initializePackagePrice() {
	$(".packages-items-price").each((function() {
		var e = $(this).val(),
			t = $(this).data("id"),
			i = $(".packages-items-" + t).val();
		bindSelectedPackage(t, $(".packages-items-price-" + t).val(), e, i, $(".packages-items-discountprice-" + t).val()), checkPackagePrice(t)
	})), updateSummaryPrice()
}

function checkPackagePrice(e) {
	var t = [],
		i = $(".data-card-items-" + e).data("parentid"),
		o = $(".item-data-price-" + i).data("price"),
		n = 0;
	o && (n = changeCurrencyToInt(o));
	for (var s = n ? parseFloat(n) : n, a = $(".data-card-items-" + e).parent().find(".data-card-items"), d = 0; d < a.length; d++) {
		d == a.length - 1 && a[d].dataset.id;
		var l = a[d].dataset.id,
			r = $(".addson-checklist-" + l).val();
		"" != r && "[{" != r && (s += calculatePackagesPrice(JSON.parse(r)));
		var c = $(".packages-items-price-" + l).val(),
			p = $(".packages-items-discountprice-" + l).val();
		t = 0 != p && null != p ? [...t, p] : [...t, c]
	}
	let u = s;
	t?.forEach((e => {
		var t = Number(e?.replace("+", "")?.replace(/[^0-9.-]+/g, ""));
		u += t
	}));
	var h = u.toLocaleString("en-US", {
		style: "currency",
		currency: "USD"
	});
	$(".item-data-price-" + i).text(h), $(".item-data-price-" + i).val(h)
}

function calculatePackagesPrice(e) {
	var t = 0;
	return e?.forEach((e => {
		var i = Number(e?.original_price?.replace("+", "")?.replace(/[^0-9.-]+/g, ""));
		t += i
	})), t
}

function hideAllBookingtabs() {
	$(".booking-tabs li").each((function() {
		var e = $(this).data("value");
		$("." + e).addClass("hidden")
	}))
}

function showEditBookingPopup(e) {
	$(".me-member-order-edit-booking-popup-" + e).removeClass("hidden")
}

function hideEditBookingPopup(e) {
	$(".me-member-order-edit-booking-popup-" + e).addClass("hidden"), $("body").css("overflow", "")
}
divScroll(compareTargetDiv, stickyTargetDiv), divScroll(stickyTargetDiv, compareTargetDiv), $(window).on("resize", (function() {
	divScroll(compareTargetDiv, stickyTargetDiv), divScroll(stickyTargetDiv, compareTargetDiv)
})), $(document).on("click", "#me-checkout-cancer-markers-popup-close-btn", (function() {
	hideCancerMarkersPopup($(this).data("id"))
})), $(document).on("click", ".markers-tags", (function() {
	var e = $(".cancer-markers-selected-id").val(),
		t = $(".cancerMarkers-selected-tags" + e).val(),
		i = $(".cancerMarkers-selected-tags-ids-" + e).val(),
		o = t ? t.split(",") : [],
		n = i ? i.split(",") : [];
	$(this).toggleClass("selected");
	var s = $(this).text().trim(),
		a = $(this).data("value");
	$(this).hasClass("selected") ? (o.push(s), n.push(a)) : (o = o.filter((e => e != s)), n = n.filter((e => e != a))), $(".cancerMarkers-selected-tags" + e).val(o?.join(",")), $(".cancerMarkers-selected-tags" + e).attr("data-text", o?.join(",")), $(".cancerMarkers-selected-tags-ids-" + e).val(n?.join(",")), n = n.map((e => e.toString())), bindCancersMarkerCount(e, n)
})), $(document).on("click", ".checkout-cancer-markers-confirm", (function() {
	var e = $(this).data("id"),
		t = $(this).data("parentid");
	confirmCancerMakers(e), showEditBookingPopup(t)
})), $(document).on("change", ".checkout-booking-time input", (function() {
	var e = $(this).next().text();
	$(".checkout-time").val(e), $(".checkout-time" + currentDataID).val(e)
})), $(document).on("click", "#checkout-time-popup", (function() {
	hideTimePopup($(this).data("id"))
})), initialCancerMarkers(), $(document).on("change", ".me-checkout-cancer-markers-popup input[type=checkbox]", (function(e) {
	if (1 == e.target.checked) {
		$(this).parent().parent().parent().prev().find("ul").css("opacity", .3), $(this).parent().parent().parent().prev().find("li").css("pointer-events", "none"), $(this).parent().parent().parent().prev().find("li").removeClass("selected");
		var t = $(".cancer-markers-selected-id").val();
		$(".cancerMarkers-selected-tags-ids-" + t).val(""), $(".cancerMarkers-selected-tags" + t).val(""), $(".cancer-markers-placeholder" + t).removeClass("hidden"), $(".cancer-markers-detail-data" + t).addClass("hidden"), $(".detail-data-list" + t).addClass("hidden"), $(".cancerMarkers-detail-data" + t).html("")
	} else $(this).parent().parent().parent().prev().find("ul").css("opacity", 1), $(this).parent().parent().parent().prev().find("li").css("pointer-events", "all")
})), $(document).on("click", "#me-checkout-addson-popup-close-btn", (function() {
	var e = $(this).data("id");
	$('input[name="addson-noaddition-' + e + '"]').prop("checked");
	hideAddsOnPopup(e)
})), initialAddsonItems(), $(document).on("click", ".select-coupon-btn", (function() {
	showCouponPopup()
})), $(document).on("click", ".coupon-tabs-list", (function() {
	$(".availableList").addClass("hidden"), $(".unavailableList").addClass("hidden");
	var e = $(this).data("id");
	$(this).addClass("active"), $(this).siblings().removeClass("active"), $("." + e).removeClass("hidden")
})), $(document).on("click", "#me-coupon-popup-close", (function() {
	hideCouponPopup()
})), $(document).on("click", ".coupon-applied-btn", (function() {
	var e = $(this).data("text"),
		t = $(this).data("id"),
		i = $(this).data("price");
	$(".promo-code").val(e), $(".promo-code").attr("data-price", i), $(".promo-code").attr("data-id", t), $(".promo-code-text").text(e), $(".before-choose-coupon").removeClass("hidden"), $(".promo-code-error").addClass("hidden"), $(".use-promo-code-btn-input-text").addClass("hidden"), $(".use-promo-code-btn").removeClass("hidden"), hideCouponPopup()
})), $(document).on("click", ".use-promo-code-btn", (function() {
	$(".before-choose-coupon").addClass("hidden");
	var e = $(".promo-code").val(),
		t = $(".promo-code").data("price"),
		i = $(".summary-card-total-price").val();
	if (e) {
		changeCurrencyToInt(i);
		$(".promo-code-text").text(e), $(".after-choose-coupon").removeClass("hidden"), $(".promo-code-error").addClass("hidden")
	} else $(".promo-code-error").removeClass("hidden"), $(".after-choose-coupon").addClass("hidden")
})), $(document).on("click", ".remove-promo-code", (function() {
	inputPromoCode()
})), $(document).on("click", ".book-now-btn", (function(e) {
	bookNowBtnEvent()
})), $(document).on("click", ".checkout-summary-collpase", (function() {
	$(this).parent().next().toggleClass("hidden"), $(this).toggleClass("active")
})), $(document).on("click", ".promo-code-error-msg", (function() {
	inputPromoCode(), $(".promo-code-error").addClass("hidden"), $(".before-choose-coupon input").focus()
})), $(document).on("click", "#book-now-error-popup-close", (function() {
	$(".book-now-error-popup").addClass("hidden"), $("body").removeClass("overflow-hidden")
})), $(document).on("click", (function(e) {
	"cancellation-reason-box" !== e.target.id && $(".cancellation-reason-box").removeClass("active"), "me-checkout-cancellation-popup" == !e.target.id && $(".me-checkout-cancellation-popup").addClass("hidden"), "me-checkout-send-email-popup" == !e.target.id && $(".me-checkout-send-email-popup").addClass("hidden")
})), document.addEventListener("DOMContentLoaded", (function() {
	if ((window.location.href.indexOf("http://localhost:9050") > -1 || window.location.href.indexOf("http://devhtml.visibleone.io/p238") > -1) && $(".wishlist-tabs .list-item").length > 0) {
		var e = $(".wishlist-tabs .list-item").first();
		e.addClass("active"), wishListTabs(e.data("id"))
	}
})), $(document).on("click", ".wishlist-tabs ul li.list-item", (function() {
	var e = $(this).data("id");
	$(this).addClass("active"), $(this).siblings().removeClass("active"), wishListTabs(e)
})), $(document).on("click", ".preview-cartbtn", (function() {
	$(".reminder-popup").removeClass("hidden fade-out"), $(".reminder-popup").addClass("fade-in"), setTimeout((() => {
		$(".reminder-popup").addClass("fade-out"), $(".reminder-popup").removeClass("fade-in"), setTimeout((() => {
			$(".reminder-popup").addClass("hidden")
		}), 1e3)
	}), 3e3)
})), $(document).on("click", ".wishlist-delete-btn", (function() {
	$(this).parent().parent().remove()
})), $(document).on("click", ".compare-remove-btn", (function() {
	$(this).parent().parent().remove()
})), $(document).on("focus", ".redeem-coupon-layer input", (function() {
	$(this).removeClass("invalid-coupon-alert"), $(".error-icon").addClass("hidden")
})), $(document).on("blur", ".redeem-coupon-layer input", (function() {
	$(".error-icon").addClass("hidden")
})), $(document).on("click", ".error-icon", (function() {
	$(this).addClass("hidden"), $(this).prev().focus()
})), $(document).on("click", ".same-with-text", (function() {
	$(this).next().toggleClass("hidden"), $(this).toggleClass("active")
})), $(document).on("click", ".same-with-content li", (function() {
	$(this).addClass("active"), $(this).siblings().removeClass("active"), $(this).parent().parent().prev().removeClass("active"), $(this).parent().parent().addClass("hidden");
	var e = $(this).data("gender"),
		t = $(this).data("firstname"),
		i = $(this).data("lastname"),
		o = $(this).data("countrycode"),
		n = $(this).data("phone");
	bindInputFieldOnDropdown($(this).data("id"), {
		gender: e,
		firstname: t,
		lastname: i,
		countryCode: o,
		phone: n
	}), disabledSaveButton()
})), $(document).on("click", (function(e) {
	e.target.classList.contains("same-with-content-item") || $(".same-with-content").addClass("hidden")
})), $(document).on("click", ".request-more-btn", (function() {
	var e = $(this).data("id"),
		t = $(this).attr("data-text");
	$(".current-selected-request-id").val(e), $(".me-checkout-special-request-popup").val(""), $(".me-checkout-special-request-popup textarea").val(t || ""), showRequestPopup()
})), $(document).on("click", "#me-checkout-me-checkout-special-request-popup-close", (function() {
	hideRequestPopup()
})), $(document).on("click", ".special-request-confirm-btn", (function() {
	var e = $(this).parent().parent().find("textarea").val(),
		t = $(".current-selected-request-id").val(),
		i = $(this).parent().parent().find("textarea").attr("data-placeholder");
	e ? ($(".request-more-btn" + t).css("text-decoration", ""), $(".request-more-btn" + t).attr("data-text", e)) : ($(".request-more-btn" + t).css("text-decoration", "underline"), $(".request-more-btn" + t).removeAttr("data-text")), $(".request-more-btn" + t).text(e || i), $(".request-more-btn" + t).removeClass("underline"), hideRequestPopup()
})), $(document).on("change", "input.checkout-make-booking", (function() {
	1 == $(this).is(":checked") ? (clearContactEditCard($(this).data("id")), $(this).parent().parent().parent().parent().next().removeClass("disabled")) : (clearContactEditCard($(this).data("id")), $(this).parent().parent().parent().parent().next().addClass("disabled"));
	disabledSaveButton()
})), $(document).on("click", ".country-code-text", (function() {
	$(this).next().toggleClass("hidden"), $(this).toggleClass("active")
})), $(document).on("click", ".country-code-list li", (function() {
	$(this).parent().prev().find(".selected-text").text($(this).text().trim());
	var e = $(this).parent().prev().find(".selected-text").data("id");
	$(".contact-info-countrycode-" + e).val($(this).text().trim()), $(this).parent().prev().removeClass("active"), $(this).parent().addClass("hidden")
})), $(document).on("click", (function(e) {
	e.target.classList.contains("country-code-item") || $(".country-code-list").addClass("hidden")
})), $(document).on("click", ".contact-info-edit", (function() {
	$(".me-checkout-contact-info-edit-card").removeClass("hidden"), $(".checkout-info-data").addClass("hidden")
})), $(document).ready((function() {
	document.querySelectorAll(".checkout-male-rdo").forEach((e => {
		e.checked = !0
	}))
})), $(document).on("focus", ".contact-info-phno", (function() {
	$(this).parent().removeClass("border-meA3"), $(this).parent().addClass("bg-whitez"), $(this).parent().addClass("border-orangeMediq")
})), $(document).on("focusout", ".contact-info-phno", (function() {
	$(this).parent().addClass("border-meA3"), $(this).parent().removeClass("border-orangeMediq"), $(this).parent().removeClass("bg-whitez")
})), $(document).on("click", ".error-first-box", (function() {
	$(this).addClass("hidden"), $(this).prev().removeClass("hidden"), $(this).prev().find("input").focus()
})), disabledSaveButton(), $(document).on("blur", ".me-checkout-contact-info-edit-container input", (function(e) {
	disabledSaveButton()
})), $(document).on("change", ".save-credit-card-container input", (function() {
	var e = $(this).data("id");
	$(".contact-info-lastname-" + e).val(), $(".contact-info-firstname-" + e).val(), $(".contact-info-phno-" + e).val(), $(".contact-info-countrycode-" + e).val()
})), $(document).on("click", ".region-text", (function() {
	$(this).next().toggleClass("hidden"), $(this).toggleClass("active")
})), $(document).on("click", ".region-list li", (function() {
	$(this).parent().prev().find(".selected-text").text($(this).text().trim()), $(this).parent().prev().find("input").val($(this).data("id")), $(this).parent().prev().removeClass("active"), $(this).addClass("active"), $(this).siblings().removeClass("active"), $(this).parent().addClass("hidden");
	var e = $(".selected-text.district").data("text"),
		t = $(".selected-text.area").data("text");
	$(".selected-text.district").text(e), $(".selected-district").val(""), $(".selected-area").val(""), $(".selected-text.area").text(t)
})), $(document).on("click", (function(e) {
	e.target.classList.contains("region-item") || $(".region-list").addClass("hidden")
})), $(document).on("click", ".district-text", (function() {
	$(this).next().toggleClass("hidden"), $(this).toggleClass("active")
})), $(document).on("click", ".district-list li", (function() {
	$(this).parent().prev().find(".selected-text").text($(this).text().trim()), $(this).parent().prev().find("input").val($(this).data("id")), $(this).parent().prev().removeClass("active"), $(this).addClass("active"), $(this).siblings().removeClass("active"), $(this).parent().addClass("hidden")
})), $(document).on("click", ".area-text", (function() {
	$(this).next().toggleClass("hidden"), $(this).toggleClass("active")
})), $(document).on("click", ".area-list li", (function() {
	$(this).parent().prev().find(".selected-text").text($(this).text().trim()), $(this).parent().prev().find("input").val($(this).data("id")), $(this).parent().prev().removeClass("active"), $(this).addClass("active"), $(this).siblings().removeClass("active"), $(this).parent().addClass("hidden")
})), $(document).on("click", (function(e) {
	e.target.classList.contains("district-item") || $(".district-list").addClass("hidden"), e.target.classList.contains("area-item") || $(".area-list").addClass("hidden"), e.target.classList.contains("region-item") || $(".region-list").addClass("hidden")
})), $(document).on("change", "input.printed-receipt", (function() {
	"yes" == $(this).val() ? ($(".yes-receipt-content").addClass("show"), $(".no-receipt-content").removeClass("show")) : ($(".yes-receipt-content").removeClass("show"), $(".no-receipt-content").addClass("show"))
})), $(document).on("click", ".go-to-payment-cardform", (function() {
	console.log("click"), $(".me-checkout-payment-method-card-form").addClass("show"), $(".me-checkout-payment-method-card-list-container").removeClass("show")
})), $(document).on("click", ".card-item", (function() {
	$(this).addClass("selected"), $(this).siblings().removeClass("selected")
})), $(document).on("click", ".selected-list-collpase", (function() {
	$(this).toggleClass("active")
})), $(document).on("click", ".available-div ul li", (function() {
	var e = $(this).attr("data-id"),
		t = $(this).parent().parent().attr("id");
	$(".me-dashboard-innercontent").each((function() {
		$(this).attr("data-id") == t ? $(this).removeClass("hidden") : $(this).addClass("hidden")
	})), $('.available-div ul li[data-id="' + e + '"]').addClass("active"), $('.available-div ul li[data-id="' + e + '"]').siblings().removeClass("active"), changeCouponTab(e)
})), window.location.href.indexOf("dashboard-coupon") > -1 && $(".available-div").each((function() {
	$(this).children("ul").children("li").first().addClass("active"), changeCouponTab($(this).children("ul").children("li").data("id"))
})), document.addEventListener("click", (e => {
	e.target.classList.contains("dash-rc-popup") && ($(".dash-rc-popup").removeClass("flex"), $("body").removeClass("overflow-hidden"))
})), $(document).on("click", ".related-products", (function() {
	var e = $(this).data("related");
	$(e).addClass("flex"), $("body").addClass("overflow-hidden")
})), $(document).on("click", ".simple-coupon-card .coupon-see-detail,.simple-coupon-card .cclogo-container,.detail-btn", (function() {
	var e = $(this).data("id");
	$(e).addClass("show"), $(".qua-collect-btn").click();
	document.body.style.overflowY = "hidden"
})), $(document).on("click", ".related-product-btn", (function() {
	$(this).parent().parent().parent().parent().removeClass("flex"), $("body").removeClass("overflow-hidden")
})), $(".pcreminder-popup-close-btn").click((function() {
	$(this).parent().parent().parent().removeClass("flex"), $("body").removeClass("overflow-hidden")
})), $(".has-reminder-alert").click((function() {
	$(".pcreminder-popup").addClass("flex"), $("body").addClass("overflow-hidden")
})), $(document).on("click", ".member-id-code-copy", (function() {
	var e = $(".member-id-code").text().trim();
	navigator.clipboard.writeText(e)
})), $(document).on("click", ".custom-packages-remark-title", (function() {
	showPackagePopup($(this).data("id"))
})), $(document).on("click", ".checkout-packages-confirm", (function() {
	var e = $(this).data("id"),
		t = ($(this).data("parentid"), $('input[name="package-id-' + e + '"]:checked').val()),
		i = $('input[name="package-id-' + e + '"]:checked').data("text"),
		o = $('input[name="package-id-' + e + '"]:checked').data("price"),
		n = $('input[name="package-id-' + e + '"]:checked').data("discount");
	$(".packages-items-id-" + e).val(t), $(".packages-items-" + e).val(i), $(".packages-items-price-" + e).val(o), $(".packages-items-discountprice-" + e).val(n), bindSelectedPackage(e, t, o, i, n), checkPackagePrice(e), hidePackagePopup(e), updateSummaryPrice()
})), $(document).on("click", "#me-checkout-packages-popup-close-btn", (function() {
	hidePackagePopup($(this).data("id"))
})), initializePackagePrice(), $(document).on("click", ".booking-tabs li", (function() {
	hideAllBookingtabs();
	var e = $(this).data("value");
	$(this).addClass("active"), $(this).siblings().removeClass("active"), $("." + e).removeClass("hidden")
})), $(document).on("click", ".me-member-order-detail-dropdownlist .dropdown-icon", (function() {
	$(this).parent().next().toggleClass("hidden"), $(this).toggleClass("active")
})), $(document).on("click", ".refund-detail-btn", (function() {
	$(".me-checkout-refund-complete-popup").removeClass("hidden"), $("body").addClass("overflow-hidden")
})), $(document).on("click", "#me-member-order-edit-booking-popup-closebtn", (function() {
	hideEditBookingPopup($(this).data("id"))
})), $(document).on("click", ".popup-back-btn", (function() {
	var e = $(this).data("id"),
		t = $(this).data("parentid");
	hideTimePopup(e), hideCancerMarkersPopup(e), hideAddsOnPopup(e), showEditBookingPopup(t)
})), $(document).on("click", ".edit-booking-btn", (function() {
	var e = $(this).data("id");
	$(".preferred-date-custom-" + e).text().trim().split(" ");
	showEditBookingPopup(e)
})), $(document).on("click", ".upload-receipt-btn", (function() {
	$(".me-member-order-receipt-popup").removeClass("hidden"), $("body").css("overflow", "hidden")
}));
var dropinput = document.querySelector("image-drag-drop-area-input");

function closeReceiptPopup() {
	$(".me-member-order-receipt-popup").addClass("hidden"), $("body").css("overflow", "")
}

function chk_scroll(e) {
	var t = $(e.currentTarget),
		i = t[0].scrollHeight - t.scrollTop(),
		o = t.outerHeight();
	$(".custom-order-boxshadow:last #cancellation-reason-box").hasClass("active") ? i <= o || i - o >= 110 ? $(".order-bottom-fixed").css("z-index", 2) : $(".order-bottom-fixed").css("z-index", 0) : $(".order-bottom-fixed").css("z-index", 1)
}
$(document).on("click", ".image-drag-drop-area", (function() {
	$(".image-drag-drop-area-input").click()
})), $(document).on("change", ".image-drag-drop-area-input", (function(e) {
	var t = e.target.files[0];
	$(".filename").text(t.name), $(".after-upload").removeClass("hidden"), $(".before-upload").addClass("hidden")
})), $(document).on("click", ".remove-selected-file", (function() {
	$(".after-upload").addClass("hidden"), $(".before-upload").removeClass("hidden")
})), $(document).on("click", "#me-member-order-receipt-popup-closebtn", (function() {
	closeReceiptPopup()
})), $(document).on("click", ".payment-types-tab .payment-tab", (function() {
	$(this).addClass("active"), $(this).siblings().removeClass("active"), "online-payment" == $(this).attr("data-id") ? ($("#online-payment").removeClass("hidden"), $("#other-payment").addClass("hidden")) : ($("#online-payment").addClass("hidden"), $("#other-payment").removeClass("hidden"))
})), $(".me-member-dashboard-right-slider").slick({
	slidesToShow: 1,
	slidesToScroll: 1,
	arrows: !1,
	dots: !0,
	dotsClass: "custom-member-slider-dots",
	autoplay: !0,
	autoplaySpeed: 3e3
}), $(document).on("click", "#me-checkout-send-email-popup-close-btn", (function() {
	$(".me-checkout-send-email-popup").addClass("hidden"), $("body").removeClass("overflow-hidden")
})), $(document).on("click", ".e-receipt-send-email-btn", (function() {
	$(".me-checkout-send-email-popup").removeClass("hidden"), $("body").addClass("overflow-hidden")
})), $(document).on("click", "#me-checkout-cancellation-popup-close-btn", (function() {
	$(".me-checkout-cancellation-popup").addClass("hidden"), $("body").removeClass("overflow-hidden")
})), $(document).on("click", ".cancel-refund-btn", (function() {
	$(".me-checkout-cancellation-popup").removeClass("hidden"), $("body").addClass("overflow-hidden")
})), $(document).on("click", ".cancellation-reason-box", (function() {
	$(this).toggleClass("active")
})), $(document).on("click", ".cancellation-reason-box-list li", (function() {
	var e = $(this).text().trim();
	$(this).parent().prev().find("span").text(e), $(this).parent().parent().find("input").val(e), $(".cancellation-reason").val(e), $(this).parent().prev().removeClass("active")
})), $(document).on("change", 'input[name="cancellation-selectall"]', (function() {
	var e = $(this).prop("checked");
	$(".cancellation-select").prop("checked", e)
})), $(document).on("change", ".cancellation-select", (function() {
	if (0 == $(this).prop("checked")) $('input[name="cancellation-selectall"]').prop("checked", !1);
	else {
		var e = $("input.cancellation-select:checked").length;
		$("input.cancellation-select").length == e && $('input[name="cancellation-selectall"]').prop("checked", !0)
	}
})), $(document).on("click", "#me-checkout-refund-processing-popup-close-btn", (function() {
	$(".me-checkout-refund-processing-popup").addClass("hidden"), $("body").removeClass("overflow-hidden")
})), $(document).on("click", "#me-checkout-refund-complete-popup-close-btn", (function() {
	$(".me-checkout-refund-complete-popup").addClass("hidden"), $("body").removeClass("overflow-hidden")
})), $(".custom-cancellation-scrollbar").scroll((function(e) {
	chk_scroll(e)
})), $(document).on("click", ".members-label-item", (function() {
	var e = $(this).data("id");
	$("#" + e).removeClass("hidden"), $("#" + e).siblings().addClass("hidden"), $(this).addClass("active"), $(this).siblings().removeClass("active")
})), $(".edit-report-btn").click((function() {
	$(".pdf-edit-upload-popup").addClass("flex"), $("body").addClass("overflow-hidden")
})), $(".delete-record-btn").click((function() {
	$(".pdf-edit-upload-popup .uploaded-file-section").remove(), $(".pdf-edit-upload-popup .drop-zone").removeClass("hidden")
}));
var pdfpicker = document.querySelector("#datepicker");

function updateThumbnail(e, t) {
	let i = e.querySelector(".drop-zone__thumb");
	e.querySelector(".drop-zone__prompt") && e.querySelector(".drop-zone__prompt").remove(), i || (i = document.createElement("div"), i.classList.add("drop-zone__thumb"), e.appendChild(i)), i.innerHTML = t.name
}

function filterFunc(e) {
	"healthRe" == e && RecordFunc(), "vacciRe" == e && VacciFunc()
}

function RecordFunc() {}

function VacciFunc() {
	$(".vacci-record-popup").addClass("flex"), $("body").addClass("overflow-hidden")
}

function phoneHideFun(e, t) {
	var i = e.slice(0, 4),
		o = t - 4,
		n = document.querySelector(".text-hide-section.phone-sector span"),
		s = "*".repeat(o);
	n.innerHTML = i + s
}

function emailHideFun(e) {
	var t = e.split("@")[0],
		i = t.length,
		o = e.length,
		n = e.substring(i, o),
		s = t.slice(0, 4),
		a = i - 4,
		d = document.querySelector(".text-hide-section.email-sector span"),
		l = "*".repeat(a);
	d.innerHTML = s + l + n
}
if ($((function() {
		null != pdfpicker && ($("#datepicker").datepicker({
			dateFormat: "dd/mm/yy"
		}), $(document).on("click", ".rd-arrow", (function() {
			$("#datepicker").focus()
		})))
	})), document.querySelectorAll(".drop-zone__input").forEach((e => {
		const t = e.closest(".drop-zone");
		t.addEventListener("click", (t => {
			e.click()
		})), e.addEventListener("change", (i => {
			e.files.length && updateThumbnail(t, e.files[0])
		})), t.addEventListener("dragover", (e => {
			e.preventDefault(), t.classList.add("drop-zone--over")
		})), ["dragleave", "dragend"].forEach((e => {
			t.addEventListener(e, (e => {
				t.classList.remove("drop-zone--over")
			}))
		})), t.addEventListener("drop", (i => {
			i.preventDefault(), i.dataTransfer.files.length && (e.files = i.dataTransfer.files, updateThumbnail(t, i.dataTransfer.files[0])), t.classList.remove("drop-zone--over")
		}))
	})), $(document).on("click", ".add-new-report-btn", (function() {
		var e = $(this).data("id"),
			t = $(".pdf-upload-popup");
		t.addClass("flex"), t.find('input[name="report-id"]').attr("value", e), $("body").addClass("overflow-hidden")
	})), $(".report-cancel-btn").click((function() {
		if ($(this).parent().parent().parent().parent().hasClass("pdf-upload-popup")) {
			var e = $(".pdf-upload-popup");
			e.removeClass("flex"), e.find('input[name="report-id"]').attr("value", "")
		} else $(this).parent().parent().parent().parent().removeClass("flex");
		$("body").removeClass("overflow-hidden")
	})), $(".eye-close-btn").click((function() {
		$(".text-section.phone-sector").addClass("hidden"), $(".text-section.email-sector").addClass("hidden"), $(".text-hide-section.phone-sector").addClass("show"), $(".text-hide-section.email-sector").addClass("show"), $(this).addClass("hidden"), $(".eye-open-btn").removeClass("hidden")
	})), $(".eye-open-btn").click((function() {
		$(".text-section.phone-sector").removeClass("hidden"), $(".text-section.email-sector").removeClass("hidden"), $(".text-hide-section.phone-sector").removeClass("show"), $(".text-hide-section.email-sector").removeClass("show"), $(this).addClass("hidden"), $(".eye-close-btn").removeClass("hidden")
	})), $("#dashboard-personal-card").length > 0) {
	var $email = $(".text-hide-section.email-sector span"),
		$emailText = $email.text(),
		$phone = $(".text-hide-section.phone-sector span"),
		$phoneText = $phone.text(),
		$phoneLength = $phoneText.length;
	phoneHideFun($phoneText, $phoneLength), emailHideFun($emailText)
}
var bodDate = document.querySelector("#bod-datepicker");
// if (null != bodDate && ($("#bod-datepicker").datepicker({
// 		dateFormat: "dd/mm/yy",
// 		onSelect: function(e, t) {
// 			setTimeout((function() {
// 				$(document).find("a.ui-state-highlight").removeClass("ui-state-highlight")
// 			}), 100)
// 		}
// 	}), setTimeout((function() {
// 		$(document).find("a.ui-state-highlight").removeClass("ui-state-highlight")
// 	}), 100), $(document).on("click", ".bod-arrow", (function() {
// 		$("#bod-datepicker").focus()
// 	}))), $(document).on("click", ".basic-edit-btn", (function() {
// 		var e = $(this).data("id");
// 		"dashboard-personal-card" == e ? $(".eye-close-btn").prop("disabled", !0) : $(".eye-close-btn").prop("disabled", !1), $("#" + e + " .input-section").addClass("show"), $("#" + e + " .text-section").addClass("hide"), $(this).prop("disabled", !0)
// 	})), $(document).on("click", ".dob-update-btn", (function() {
// 		var e = $(this).data("id");
// 		$("#" + e + " .basic-edit-btn").click()
// 	})), $(document).on("click", ".personal-detail-save-btn", (function() {
// 		var e = $(this).data("id");
// 		"dashboard-personal-card" == e && $(".eye-close-btn").prop("disabled", !1), $("#" + e + " .input-section").removeClass("show"), $("#" + e + " .text-section").removeClass("hide"), $("#" + e + " .basic-edit-btn").prop("disabled", !1)
// 	})), $(document).on("click", ".nso-name-btn", (function() {
// 		$(this).siblings(".name-selector-option--dropdown-list").hasClass("show") ? ($(this).siblings(".name-selector-option--dropdown-list").removeClass("show"), $(this).children("img").removeClass("rotate-180")) : ($(this).siblings(".name-selector-option--dropdown-list").addClass("show"), $(this).children("img").addClass("rotate-180"))
// 	})), $(".name-selector-option").length > 0) {
// 	var $cusSelectOption = $(".name-selector-option");
// 	$cusSelectOption.each((function() {
// 		$(this).find(".nso-dropdown-lists li").each((function() {
// 			if ($(this).hasClass("active")) {
// 				$(this).parent().parent().parent().find('input[type="hidden"]').attr("value", $(this).data("value"));
// 				var e = $(this).parent().parent().parent().find(".nso-name-btn");
// 				e.children("span").text($(this).data("value")), e.children("img").removeClass("rotate-180")
// 			}
// 		}))
// 	}))
// }
$(document).on("click", ".nso-dropdown-lists li", (function() {
	$(this).addClass("active"), $(this).siblings().removeClass("active"), $(this).parent().parent().removeClass("show"), $(this).parent().parent().parent().find('input[type="hidden"]').attr("value", $(this).data("value"));
	var e = $(this).parent().parent().parent().find(".nso-name-btn");
	e.children("span").text($(this).data("value")), e.children("img").removeClass("rotate-180")
})), $(document).on("click", ".verify-phone-btn", (function() {
	resendLink(60), $(".ph-verification-code-popup").addClass("flex"), $("body").addClass("overflow-hidden")
})), $(document).on("click", ".verify-email-btn", (function() {
	$(".email-verification-code-popup").addClass("flex"), $("body").addClass("overflow-hidden")
})), $(".office-branch").click((function() {
	console.log($(this)), $(".office-branch").removeClass("active"), $(this).addClass("active");
	const e = $(this).data("branchid");
	$(".office-address-tab").addClass("hidden"), $(`#${e}`).removeClass("hidden")
}));
var $drinkCheck, vaccDate = document.querySelector("#vacci-date");
(null != vaccDate 
//     && ($("#vacci-date").datepicker({
// 	dateFormat: "dd/mm/yy",
// 	onSelect: function(e, t) {
// 		setTimeout((function() {
// 			$(document).find("a.ui-state-highlight").removeClass("ui-state-highlight")
// 		}), 100)
// 	}
// }), setTimeout((function() {
// 	$(document).find("a.ui-state-highlight").removeClass("ui-state-highlight")
// }), 100)
),
 $(".vacci-cancel-btn").click((function() {
	$(".new-vacci-record-popup").removeClass("flex"), $("body").removeClass("overflow-hidden")
})), $(document).ready((function() {
	$(".profile-upload").on("change", (function() {
		! function(e) {
			if (e.files && e.files[0]) {
				var t = new FileReader;
				t.onload = function(e) {
					$(".profile-pic").attr("src", e.target.result).removeClass("opacity-75")
				}, t.readAsDataURL(e.files[0])
			}
		}(this)
	})), $(".upload-button").on("click", (function() {
		$(".profile-upload").click()
	}))
})), $(".add-new-record-btn").click((function() {
	$(".new-vacci-record-popup").addClass("flex"), $("body").addClass("overflow-hidden"), $(this).parent().parent().parent().parent().removeClass("flex")
})), document.addEventListener("click", (e => {
	e.target.classList.contains("vacci-record-popup") && ($(".vacci-record-popup").removeClass("flex"), $("body").removeClass("overflow-hidden"))
})), $(document).on("click", ".edit-vacci-record-btn", (function() {
	var e = $(this).data("parent");
	$("." + e).removeClass("flex"), $(".new-vacci-record-popup").addClass("flex"), $("body").addClass("overflow-hidden")
})), $('input[name="drink-check"]').change((function() {
	1 == $(this).val() ? $(".drinkYes").removeClass("hidden") : $(".drinkYes").addClass("hidden")
})), $('input[name="drink-check"]').length > 0 && ($drinkCheck = $('input[name="drink-check"]')).each((function() {
	1 == $(this).prop("checked") && (1 == $(this).val() ? $(".drinkYes").removeClass("hidden") : $(".drinkYes").addClass("hidden"))
}));
($('input[name="smoke-check"]').change((function() {
	1 == $(this).val() ? $(".smokeYes").removeClass("hidden") : $(".smokeYes").addClass("hidden")
})), $('input[name="smoke-check"]').length > 0) && ($drinkCheck = $('input[name="smoke-check"]')).each((function() {
	1 == $(this).prop("checked") && (1 == $(this).val() ? $(".smokeYes").removeClass("hidden") : $(".smokeYes").addClass("hidden"))
}));
($('input[name="liver-check"]').change((function() {
	1 == $(this).val() ? $(".livernot").removeClass("hidden") : $(".livernot").addClass("hidden")
})), $('input[name="liver-check"]').length > 0) && ($drinkCheck = $('input[name="liver-check"]')).each((function() {
	1 == $(this).prop("checked") && (1 == $(this).val() ? $(".livernot").removeClass("hidden") : $(".livernot").addClass("hidden"))
}));
($('input[name="renal-check"]').change((function() {
	1 == $(this).val() ? $(".renalnot").removeClass("hidden") : $(".renalnot").addClass("hidden")
})), $('input[name="renal-check"]').length > 0) && ($drinkCheck = $('input[name="renal-check"]')).each((function() {
	1 == $(this).prop("checked") && (1 == $(this).val() ? $(".renalnot").removeClass("hidden") : $(".renalnot").addClass("hidden"))
}));
($('input[name="personal-history-check"]').change((function() {
	1 == $(this).val() ? $(".personal-medical-yes").removeClass("hidden") : $(".personal-medical-yes").addClass("hidden")
})), $('input[name="personal-history-check"]').length > 0) && ($drinkCheck = $('input[name="personal-history-check"]')).each((function() {
	1 == $(this).prop("checked") && (1 == $(this).val() ? $(".personal-medical-yes").removeClass("hidden") : $(".personal-medical-yes").addClass("hidden"))
}));
($('input[name="select-history[]"]').change((function() {
	"personal-history7" == $(this).data("id") ? $(".personal-history-other").removeClass("hidden") : $(".personal-history-other").addClass("hidden")
})), $('input[name="family-history-check"]').change((function() {
	1 == $(this).val() ? $(".family-medical-yes").removeClass("hidden") : $(".family-medical-yes").addClass("hidden")
})), $('input[name="family-history-check"]').length > 0) && ($drinkCheck = $('input[name="family-history-check"]')).each((function() {
	1 == $(this).prop("checked") && (1 == $(this).val() ? $(".family-medical-yes").removeClass("hidden") : $(".family-medical-yes").addClass("hidden"))
}));
($('input[name="select-family-history[]"]').change((function() {
	"personal-history7" == $(this).data("id") ? $(".family-history-other").removeClass("hidden") : $(".family-history-other").addClass("hidden")
})), $('input[name="allergy-check"]').change((function() {
	1 == $(this).val() ? $(".allergy-yes").removeClass("hidden") : $(".allergy-yes").addClass("hidden")
})), $('input[name="allergy-checkk"]').length > 0) && ($drinkCheck = $('input[name="allergy-checkk"]')).each((function() {
	1 == $(this).prop("checked") && (1 == $(this).val() ? $(".allergy-yes").removeClass("hidden") : $(".allergy-yes").addClass("hidden"))
}));

function RecordList() {
	$(".health-record-popup").addClass("flex"), $("body").addClass("overflow-hidden")
}
$('input[name="select-allergy[]"]').change((function() {
	"personal-history5" == $(this).data("id") ? $(".allergy-history-other").removeClass("hidden") : $(".allergy-history-other").addClass("hidden")
})), $(".health-cancel-btn").click((function() {
	var e = $(this).data("parent");
	$("#" + e).removeClass("flex"), $("body").removeClass("overflow-hidden")
})), $(document).on("click", ".record-action-btn", (function() {
	var e = $(this).data("action");
	"record" == e && RecordList(), "vaccine" == e && VacciFunc()
})), $(document).on("click", ".edit-member-btn", (function() {
	$(".delete-member-card-btn").addClass("show"), $(this).addClass("hidden"), $(".cancel-edit-btn").addClass("show")
})), $(document).on("click", ".cancel-edit-btn", (function() {
	$(this).removeClass("show"), $(".delete-member-card-btn").removeClass("show"), $(".edit-member-btn").removeClass("hidden")
})), $(document).on("click", ".delete-member-card-btn", (function() {
	var e = $(this).data("id");
	$("#del-" + e).addClass("flex"), $("body").addClass("overflow-hidden")
})), $(".add-member-btn").on("click", (function() {
	$(".add-member-popup").addClass("flex"), $("body").addClass("overflow-hidden")
})), $(".relationship-cancel-btn").click((function() {
	$(".member-info-popup").removeClass("flex"), $("body").removeClass("overflow-hidden")
}));
var relationDate = document.querySelector("#relationship-dob");
null != relationDate 
// && ($("#relationship-dob").datepicker({
// 	dateFormat: "dd/mm/yy",
// 	onSelect: function(e, t) {
// 		setTimeout((function() {
// 			$(document).find("a.ui-state-highlight").removeClass("ui-state-highlight")
// 		}), 100)
// 	}
// }), 
$("#relationship-dob").length > 0 && $(document).on("click", ".relationship-dob-icon", (function() {
	$("#relationship-dob").focus()
}))
//),
 $(".del-member-confirm-btn").click((function() {
	var e = $(this).data("remove");
	$("#" + e).remove()
})), $(".custom-cancel-btn").click((function() {
	var e = $(this).data("id");
	$("#" + e).removeClass("flex"), $("body").removeClass("overflow-hidden")
})), $(".member-cancel-btn").click((function() {
	$(".add-member-popup").removeClass("flex"), $("body").removeClass("overflow-hidden")
})), $(document).on("click", "#member-confirm-btn", (function() {
	$(".add-member-popup").removeClass("flex"), $(".member-info-popup").addClass("flex"), $("body").addClass("overflow-hidden")
})), $('input[name="my-member[]"]').change((function() {
	console.log($(this).val()), 0 == $(this).val() ? (console.log("if"), $(this).parent().parent().parent().addClass("selected")) : (console.log("here"), $(".new-member-section").removeClass("selected"))
}));