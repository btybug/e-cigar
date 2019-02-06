/*! formstone v1.4.8 [core.js] 2018-06-21 | GPL-3.0 License | formstone.it */
!function (e) {
    "function" == typeof define && define.amd ? define(["jquery"], e) : e(jQuery);
}(function (e) {
    "use strict";
    function t(e, t, n, s) {
        var i,
            r = { raw: {} };s = s || {};for (i in s) {
            s.hasOwnProperty(i) && ("classes" === e ? (r.raw[s[i]] = t + "-" + s[i], r[s[i]] = "." + t + "-" + s[i]) : (r.raw[i] = s[i], r[i] = s[i] + "." + t));
        }for (i in n) {
            n.hasOwnProperty(i) && ("classes" === e ? (r.raw[i] = n[i].replace(/{ns}/g, t), r[i] = n[i].replace(/{ns}/g, "." + t)) : (r.raw[i] = n[i].replace(/.{ns}/g, ""), r[i] = n[i].replace(/{ns}/g, t)));
        }return r;
    }function n() {
        p.windowWidth = p.$window.width(), p.windowHeight = p.$window.height(), g = f.startTimer(g, y, s);
    }function s() {
        for (var e in p.ResizeHandlers) {
            p.ResizeHandlers.hasOwnProperty(e) && p.ResizeHandlers[e].callback.call(window, p.windowWidth, p.windowHeight);
        }
    }function i() {
        if (p.support.raf) {
            p.window.requestAnimationFrame(i);for (var e in p.RAFHandlers) {
                p.RAFHandlers.hasOwnProperty(e) && p.RAFHandlers[e].callback.call(window);
            }
        }
    }function r(e, t) {
        return parseInt(e.priority) - parseInt(t.priority);
    }var o,
        a,
        c,
        l = "undefined" != typeof window ? window : this,
        u = l.document,
        d = function d() {
        this.Version = "@version", this.Plugins = {}, this.DontConflict = !1, this.Conflicts = { fn: {} }, this.ResizeHandlers = [], this.RAFHandlers = [], this.window = l, this.$window = e(l), this.document = u, this.$document = e(u), this.$body = null, this.windowWidth = 0, this.windowHeight = 0, this.fallbackWidth = 1024, this.fallbackHeight = 768, this.userAgent = window.navigator.userAgent || window.navigator.vendor || window.opera, this.isFirefox = /Firefox/i.test(this.userAgent), this.isChrome = /Chrome/i.test(this.userAgent), this.isSafari = /Safari/i.test(this.userAgent) && !this.isChrome, this.isMobile = /Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(this.userAgent), this.isIEMobile = /IEMobile/i.test(this.userAgent), this.isFirefoxMobile = this.isFirefox && this.isMobile, this.transform = null, this.transition = null, this.support = { file: !!(window.File && window.FileList && window.FileReader), history: !!(window.history && window.history.pushState && window.history.replaceState), matchMedia: !(!window.matchMedia && !window.msMatchMedia), pointer: !!window.PointerEvent, raf: !(!window.requestAnimationFrame || !window.cancelAnimationFrame), touch: !!("ontouchstart" in window || window.DocumentTouch && document instanceof window.DocumentTouch), transition: !1, transform: !1 };
    },
        f = { killEvent: function killEvent(e, t) {
            try {
                e.preventDefault(), e.stopPropagation(), t && e.stopImmediatePropagation();
            } catch (e) {}
        }, killGesture: function killGesture(e) {
            try {
                e.preventDefault();
            } catch (e) {}
        }, lockViewport: function lockViewport(t) {
            v[t] = !0, e.isEmptyObject(v) || b || (o.length ? o.attr("content", c) : o = e("head").append('<meta name="viewport" content="' + c + '">'), p.$body.on(m.gestureChange, f.killGesture).on(m.gestureStart, f.killGesture).on(m.gestureEnd, f.killGesture), b = !0);
        }, unlockViewport: function unlockViewport(t) {
            "undefined" !== e.type(v[t]) && delete v[t], e.isEmptyObject(v) && b && (o.length && (a ? o.attr("content", a) : o.remove()), p.$body.off(m.gestureChange).off(m.gestureStart).off(m.gestureEnd), b = !1);
        }, startTimer: function startTimer(e, t, n, s) {
            return f.clearTimer(e), s ? setInterval(n, t) : setTimeout(n, t);
        }, clearTimer: function clearTimer(e, t) {
            e && (t ? clearInterval(e) : clearTimeout(e), e = null);
        }, sortAsc: function sortAsc(e, t) {
            return parseInt(e, 10) - parseInt(t, 10);
        }, sortDesc: function sortDesc(e, t) {
            return parseInt(t, 10) - parseInt(e, 10);
        }, decodeEntities: function decodeEntities(e) {
            var t = p.document.createElement("textarea");return t.innerHTML = e, t.value;
        }, parseQueryString: function parseQueryString(e) {
            for (var t = {}, n = e.slice(e.indexOf("?") + 1).split("&"), s = 0; s < n.length; s++) {
                var i = n[s].split("=");t[i[0]] = i[1];
            }return t;
        } },
        p = new d(),
        h = e.Deferred(),
        w = { base: "{ns}", element: "{ns}-element" },
        m = { namespace: ".{ns}", beforeUnload: "beforeunload.{ns}", blur: "blur.{ns}", change: "change.{ns}", click: "click.{ns}", dblClick: "dblclick.{ns}", drag: "drag.{ns}", dragEnd: "dragend.{ns}", dragEnter: "dragenter.{ns}", dragLeave: "dragleave.{ns}", dragOver: "dragover.{ns}", dragStart: "dragstart.{ns}", drop: "drop.{ns}", error: "error.{ns}", focus: "focus.{ns}", focusIn: "focusin.{ns}", focusOut: "focusout.{ns}", gestureChange: "gesturechange.{ns}", gestureStart: "gesturestart.{ns}", gestureEnd: "gestureend.{ns}", input: "input.{ns}", keyDown: "keydown.{ns}", keyPress: "keypress.{ns}", keyUp: "keyup.{ns}", load: "load.{ns}", mouseDown: "mousedown.{ns}", mouseEnter: "mouseenter.{ns}", mouseLeave: "mouseleave.{ns}", mouseMove: "mousemove.{ns}", mouseOut: "mouseout.{ns}", mouseOver: "mouseover.{ns}", mouseUp: "mouseup.{ns}", panStart: "panstart.{ns}", pan: "pan.{ns}", panEnd: "panend.{ns}", resize: "resize.{ns}", scaleStart: "scalestart.{ns}", scaleEnd: "scaleend.{ns}", scale: "scale.{ns}", scroll: "scroll.{ns}", select: "select.{ns}", swipe: "swipe.{ns}", touchCancel: "touchcancel.{ns}", touchEnd: "touchend.{ns}", touchLeave: "touchleave.{ns}", touchMove: "touchmove.{ns}", touchStart: "touchstart.{ns}" },
        g = null,
        y = 20,
        v = [],
        b = !1;return d.prototype.NoConflict = function () {
        p.DontConflict = !0;for (var t in p.Plugins) {
            p.Plugins.hasOwnProperty(t) && (e[t] = p.Conflicts[t], e.fn[t] = p.Conflicts.fn[t]);
        }
    }, d.prototype.Ready = function (e) {
        "complete" === p.document.readyState || "loading" !== p.document.readyState && !p.document.documentElement.doScroll ? e() : p.document.addEventListener("DOMContentLoaded", e);
    }, d.prototype.Plugin = function (n, s) {
        return p.Plugins[n] = function (n, s) {
            function i(t) {
                var i,
                    r,
                    a,
                    l = "object" === e.type(t),
                    u = Array.prototype.slice.call(arguments, l ? 1 : 0),
                    d = this,
                    f = e();for (t = e.extend(!0, {}, s.defaults || {}, l ? t : {}), r = 0, a = d.length; r < a; r++) {
                    if (i = d.eq(r), !o(i)) {
                        s.guid++;var p = "__" + s.guid,
                            h = s.classes.raw.base + p,
                            w = i.data(n + "-options"),
                            m = e.extend(!0, { $el: i, guid: p, numGuid: s.guid, rawGuid: h, dotGuid: "." + h }, t, "object" === e.type(w) ? w : {});i.addClass(s.classes.raw.element).data(c, m), s.methods._construct.apply(i, [m].concat(u)), f = f.add(i);
                    }
                }for (r = 0, a = f.length; r < a; r++) {
                    i = f.eq(r), s.methods._postConstruct.apply(i, [o(i)]);
                }return d;
            }function o(e) {
                return e.data(c);
            }var a = "fs-" + n,
                c = "fs" + n.replace(/(^|\s)([a-z])/g, function (e, t, n) {
                return t + n.toUpperCase();
            });return s.initialized = !1, s.priority = s.priority || 10, s.classes = t("classes", a, w, s.classes), s.events = t("events", n, m, s.events), s.functions = e.extend({ getData: o, iterate: function iterate(t) {
                    for (var n = this, s = Array.prototype.slice.call(arguments, 1), i = 0, r = n.length; i < r; i++) {
                        var a = n.eq(i),
                            c = o(a) || {};"undefined" !== e.type(c.$el) && t.apply(a, [c].concat(s));
                    }return n;
                } }, f, s.functions), s.methods = e.extend(!0, { _construct: e.noop, _postConstruct: e.noop, _destruct: e.noop, _resize: !1, destroy: function destroy(e) {
                    s.functions.iterate.apply(this, [s.methods._destruct].concat(Array.prototype.slice.call(arguments, 1))), this.removeClass(s.classes.raw.element).removeData(c);
                } }, s.methods), s.utilities = e.extend(!0, { _initialize: !1, _delegate: !1, defaults: function defaults(t) {
                    s.defaults = e.extend(!0, s.defaults, t || {});
                } }, s.utilities), s.widget && (p.Conflicts.fn[n] = e.fn[n], e.fn[c] = function (t) {
                if (this instanceof e) {
                    var n = s.methods[t];if ("object" === e.type(t) || !t) return i.apply(this, arguments);if (n && 0 !== t.indexOf("_")) {
                        var r = [n].concat(Array.prototype.slice.call(arguments, 1));return s.functions.iterate.apply(this, r);
                    }return this;
                }
            }, p.DontConflict || (e.fn[n] = e.fn[c])), p.Conflicts[n] = e[n], e[c] = s.utilities._delegate || function (t) {
                var n = s.utilities[t] || s.utilities._initialize || !1;if (n) {
                    var i = Array.prototype.slice.call(arguments, "object" === e.type(t) ? 0 : 1);return n.apply(window, i);
                }
            }, p.DontConflict || (e[n] = e[c]), s.namespace = n, s.namespaceClean = c, s.guid = 0, s.methods._resize && (p.ResizeHandlers.push({ namespace: n, priority: s.priority, callback: s.methods._resize }), p.ResizeHandlers.sort(r)), s.methods._raf && (p.RAFHandlers.push({ namespace: n, priority: s.priority, callback: s.methods._raf }), p.RAFHandlers.sort(r)), s;
        }(n, s), p.Plugins[n];
    }, p.$window.on("resize.fs", n), n(), i(), p.Ready(function () {
        p.$body = e("body"), e("html").addClass(p.support.touch ? "touchevents" : "no-touchevents"), o = e('meta[name="viewport"]'), a = !!o.length && o.attr("content"), c = "width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0", h.resolve();
    }), m.clickTouchStart = m.click + " " + m.touchStart, function () {
        var e,
            t = { WebkitTransition: "webkitTransitionEnd", MozTransition: "transitionend", OTransition: "otransitionend", transition: "transitionend" },
            n = ["transition", "-webkit-transition"],
            s = { transform: "transform", MozTransform: "-moz-transform", OTransform: "-o-transform", msTransform: "-ms-transform", webkitTransform: "-webkit-transform" },
            i = "transitionend",
            r = "",
            o = "",
            a = document.createElement("div");for (e in t) {
            if (t.hasOwnProperty(e) && e in a.style) {
                i = t[e], p.support.transition = !0;break;
            }
        }m.transitionEnd = i + ".{ns}";for (e in n) {
            if (n.hasOwnProperty(e) && n[e] in a.style) {
                r = n[e];break;
            }
        }p.transition = r;for (e in s) {
            if (s.hasOwnProperty(e) && s[e] in a.style) {
                p.support.transform = !0, o = s[e];break;
            }
        }p.transform = o;
    }(), window.Formstone = p, p;
});
/*! formstone v1.4.8 [mediaquery.js] 2018-06-21 | GPL-3.0 License | formstone.it */
!function (e) {
    "function" == typeof define && define.amd ? define(["jquery", "./core"], e) : e(jQuery, Formstone);
}(function (e, t) {
    "use strict";
    function n() {
        v = { unit: s.unit };for (var e in u) {
            if (u.hasOwnProperty(e)) for (var t in l[e]) {
                if (l[e].hasOwnProperty(t)) {
                    var n = "Infinity" === t ? 1 / 0 : parseInt(t, 10),
                        i = e.indexOf("max") > -1;l[e][t].matches && (i ? (!v[e] || n < v[e]) && (v[e] = n) : (!v[e] || n > v[e]) && (v[e] = n));
                }
            }
        }
    }function i() {
        n(), m.trigger(h.mqChange, [v]);
    }function r(e) {
        var t = a(e.media),
            n = d[t],
            i = e.matches,
            r = i ? h.enter : h.leave;if (n && (n.active || !n.active && i)) {
            for (var o in n[r]) {
                n[r].hasOwnProperty(o) && n[r][o].apply(n.mq);
            }n.active = !0;
        }
    }function a(e) {
        return e.replace(/[^a-z0-9\s]/gi, "").replace(/[_\s]/g, "").replace(/^\s+|\s+$/g, "");
    }var o = t.Plugin("mediaquery", { utilities: { _initialize: function _initialize(t) {
                t = t || {};for (var n in u) {
                    u.hasOwnProperty(n) && (s[n] = t[n] ? e.merge(t[n], s[n]) : s[n]);
                }(s = e.extend(s, t)).minWidth.sort(f.sortDesc), s.maxWidth.sort(f.sortAsc), s.minHeight.sort(f.sortDesc), s.maxHeight.sort(f.sortAsc);for (var r in u) {
                    if (u.hasOwnProperty(r)) {
                        l[r] = {};for (var a in s[r]) {
                            if (s[r].hasOwnProperty(a)) {
                                var o = window.matchMedia("(" + u[r] + ": " + (s[r][a] === 1 / 0 ? 1e5 : s[r][a]) + s.unit + ")");o.addListener(i), l[r][s[r][a]] = o;
                            }
                        }
                    }
                }i();
            }, state: function state() {
                return v;
            }, bind: function bind(e, t, n) {
                var i = c.matchMedia(t),
                    o = a(i.media);d[o] || (d[o] = { mq: i, active: !0, enter: {}, leave: {} }, d[o].mq.addListener(r));for (var s in n) {
                    n.hasOwnProperty(s) && d[o].hasOwnProperty(s) && (d[o][s][e] = n[s]);
                }var m = d[o],
                    f = i.matches;f && m[h.enter].hasOwnProperty(e) ? (m[h.enter][e].apply(i), m.active = !0) : !f && m[h.leave].hasOwnProperty(e) && (m[h.leave][e].apply(i), m.active = !1);
            }, unbind: function unbind(e, t) {
                if (e) if (t) {
                    var n = a(t);d[n] && (d[n].enter[e] && delete d[n].enter[e], d[n].leave[e] && delete d[n].leave[e]);
                } else for (var i in d) {
                    d.hasOwnProperty(i) && (d[i].enter[e] && delete d[i].enter[e], d[i].leave[e] && delete d[i].leave[e]);
                }
            } }, events: { mqChange: "mqchange" } }),
        s = { minWidth: [0], maxWidth: [1 / 0], minHeight: [0], maxHeight: [1 / 0], unit: "px" },
        h = e.extend(o.events, { enter: "enter", leave: "leave" }),
        m = t.$window,
        c = m[0],
        f = o.functions,
        v = null,
        d = [],
        l = {},
        u = { minWidth: "min-width", maxWidth: "max-width", minHeight: "min-height", maxHeight: "max-height" };
});
/*! formstone v1.4.8 [touch.js] 2018-06-21 | GPL-3.0 License | formstone.it */
!function (e) {
    "function" == typeof define && define.amd ? define(["jquery", "./core"], e) : e(jQuery, Formstone);
}(function (e, t) {
    "use strict";
    function a(e) {
        e.preventManipulation && e.preventManipulation();var t = e.data,
            a = e.originalEvent;if (a.type.match(/(up|end|cancel)$/i)) s(e);else {
            if (a.pointerId) {
                var o = !1;for (var p in t.touches) {
                    t.touches[p].id === a.pointerId && (o = !0, t.touches[p].pageX = a.pageX, t.touches[p].pageY = a.pageY);
                }o || t.touches.push({ id: a.pointerId, pageX: a.pageX, pageY: a.pageY });
            } else t.touches = a.touches;a.type.match(/(down|start)$/i) ? n(e) : a.type.match(/move$/i) && i(e);
        }
    }function n(n) {
        var o = n.data,
            p = "undefined" !== e.type(o.touches) && o.touches.length ? o.touches[0] : null;p && o.$el.off(d.mouseDown), o.touching || (o.startE = n.originalEvent, o.startX = p ? p.pageX : n.pageX, o.startY = p ? p.pageY : n.pageY, o.startT = new Date().getTime(), o.scaleD = 1, o.passedAxis = !1), o.$links && o.$links.off(d.click);var u = c(o.scale ? d.scaleStart : d.panStart, n, o.startX, o.startY, o.scaleD, 0, 0, "", "");if (o.scale && o.touches && o.touches.length >= 2) {
            var h = o.touches;o.pinch = { startX: r(h[0].pageX, h[1].pageX), startY: r(h[0].pageY, h[1].pageY), startD: l(h[1].pageX - h[0].pageX, h[1].pageY - h[0].pageY) }, u.pageX = o.startX = o.pinch.startX, u.pageY = o.startY = o.pinch.startY;
        }o.touching || (o.touching = !0, o.pan && !p && X.on(d.mouseMove, o, i).on(d.mouseUp, o, s), t.support.pointer ? X.on([d.pointerMove, d.pointerUp, d.pointerCancel].join(" "), o, a) : X.on([d.touchMove, d.touchEnd, d.touchCancel].join(" "), o, a), o.$el.trigger(u));
    }function i(t) {
        var a = t.data,
            n = "undefined" !== e.type(a.touches) && a.touches.length ? a.touches[0] : null,
            i = n ? n.pageX : t.pageX,
            o = n ? n.pageY : t.pageY,
            p = i - a.startX,
            u = o - a.startY,
            h = p > 0 ? "right" : "left",
            g = u > 0 ? "down" : "up",
            X = Math.abs(p) > a.threshold,
            Y = Math.abs(u) > a.threshold;if (!a.passedAxis && a.axis && (a.axisX && Y || a.axisY && X)) s(t);else {
            !a.passedAxis && (!a.axis || a.axis && a.axisX && X || a.axisY && Y) && (a.passedAxis = !0), a.passedAxis && (f.killEvent(t), f.killEvent(a.startE));var v = !0,
                x = c(a.scale ? d.scale : d.pan, t, i, o, a.scaleD, p, u, h, g);if (a.scale) if (a.touches && a.touches.length >= 2) {
                var m = a.touches;a.pinch.endX = r(m[0].pageX, m[1].pageX), a.pinch.endY = r(m[0].pageY, m[1].pageY), a.pinch.endD = l(m[1].pageX - m[0].pageX, m[1].pageY - m[0].pageY), a.scaleD = a.pinch.endD / a.pinch.startD, x.pageX = a.pinch.endX, x.pageY = a.pinch.endY, x.scale = a.scaleD, x.deltaX = a.pinch.endX - a.pinch.startX, x.deltaY = a.pinch.endY - a.pinch.startY;
            } else a.pan || (v = !1);v && a.$el.trigger(x);
        }
    }function s(t) {
        var a = t.data,
            i = "undefined" !== e.type(a.touches) && a.touches.length ? a.touches[0] : null,
            s = i ? i.pageX : t.pageX,
            p = i ? i.pageY : t.pageY,
            r = s - a.startX,
            l = p - a.startY,
            u = new Date().getTime(),
            h = a.scale ? d.scaleEnd : d.panEnd,
            g = r > 0 ? "right" : "left",
            Y = l > 0 ? "down" : "up",
            v = Math.abs(r) > 1,
            x = Math.abs(l) > 1;if (a.swipe && u - a.startT < a.time && Math.abs(r) > a.threshold && (h = d.swipe), a.axis && (a.axisX && x || a.axisY && v) || v || x) {
            a.$links = a.$el.find("a");for (var m = 0, w = a.$links.length; m < w; m++) {
                o(a.$links.eq(m), a);
            }
        }var M = c(h, t, s, p, a.scaleD, r, l, g, Y);X.off([d.touchMove, d.touchEnd, d.touchCancel, d.mouseMove, d.mouseUp, d.pointerMove, d.pointerUp, d.pointerCancel].join(" ")), a.$el.trigger(M), a.touches = [], a.scale, i && (a.touchTimer = f.startTimer(a.touchTimer, 5, function () {
            a.$el.on(d.mouseDown, a, n);
        })), a.touching = !1;
    }function o(t, a) {
        t.on(d.click, a, p);var n = e._data(t[0], "events").click;n.unshift(n.pop());
    }function p(e) {
        f.killEvent(e, !0), e.data.$links.off(d.click);
    }function c(t, a, n, i, s, o, p, c, r) {
        return e.Event(t, { originalEvent: a, bubbles: !0, pageX: n, pageY: i, scale: s, deltaX: o, deltaY: p, directionX: c, directionY: r });
    }function r(e, t) {
        return (e + t) / 2;
    }function l(e, t) {
        return Math.sqrt(e * e + t * t);
    }function u(e, t) {
        e.css({ "-ms-touch-action": t, "touch-action": t });
    }var h = !t.window.PointerEvent,
        g = t.Plugin("touch", { widget: !0, defaults: { axis: !1, pan: !1, scale: !1, swipe: !1, threshold: 10, time: 50 }, methods: { _construct: function _construct(e) {
                if (e.touches = [], e.touching = !1, this.on(d.dragStart, f.killEvent), e.swipe && (e.pan = !0), e.scale && (e.axis = !1), e.axisX = "x" === e.axis, e.axisY = "y" === e.axis, t.support.pointer) {
                    var i = "";!e.axis || e.axisX && e.axisY ? i = "none" : (e.axisX && (i += " pan-y"), e.axisY && (i += " pan-x")), u(this, i), this.on(d.pointerDown, e, a);
                } else this.on(d.touchStart, e, a).on(d.mouseDown, e, n);
            }, _destruct: function _destruct(e) {
                this.off(d.namespace), u(this, "");
            } }, events: { pointerDown: h ? "MSPointerDown" : "pointerdown", pointerUp: h ? "MSPointerUp" : "pointerup", pointerMove: h ? "MSPointerMove" : "pointermove", pointerCancel: h ? "MSPointerCancel" : "pointercancel" } }),
        d = g.events,
        f = g.functions,
        X = t.$window;d.pan = "pan", d.panStart = "panstart", d.panEnd = "panend", d.scale = "scale", d.scaleStart = "scalestart", d.scaleEnd = "scaleend", d.swipe = "swipe";
});
/*! formstone v1.4.8 [carousel.js] 2018-06-21 | GPL-3.0 License | formstone.it */
!function (e) {
    "function" == typeof define && define.amd ? define(["jquery", "./core", "./mediaquery", "./touch"], e) : e(jQuery, Formstone);
}(function (e, t) {
    "use strict";
    function i() {
        z = e(L.base);
    }function n(e) {
        e.enabled && (N.clearTimer(e.autoTimer), e.enabled = !1, e.$subordinate.off(H.update), this.removeClass([X.enabled, X.animated].join(" ")).off(H.namespace), e.$canister.fsTouch("destroy").off(H.namespace).attr("style", "").css(G, "none"), e.$items.css({ width: "", height: "" }).removeClass([X.visible, L.item_previous, L.item_next].join(" ")), e.$images.off(H.namespace), e.$controlItems.off(H.namespace), e.$pagination.html("").off(H.namespace), f(e), e.useMargin ? e.$canister.css({ marginLeft: "" }) : e.$canister.css(E, ""), e.index = 0);
    }function a(e) {
        e.enabled || (e.enabled = !0, this.addClass(X.enabled), e.$controlItems.on(H.click, e, g), e.$pagination.on(H.click, L.page, e, p), e.$items.on(H.click, e, M), e.$subordinate.on(H.update, e, I), I({ data: e }, 0), e.$canister.fsTouch({ axis: "x", pan: !0, swipe: !0 }).on(H.panStart, e, C).on(H.pan, e, x).on(H.panEnd, e, w).on(H.swipe, e, T).on(H.focusIn, e, W).css(G, ""), o(e), e.$images.on(H.load, e, u), e.autoAdvance && (e.autoTimer = N.startTimer(e.autoTimer, e.autoTime, function () {
            m(e);
        }, !0)), s.call(this, e));
    }function s(t) {
        if (t.enabled) {
            var i, n, a, s, o;if (t.count = t.$items.length, t.count < 1) return f(t), void t.$canister.css({ height: "" });if (this.removeClass(X.animated), t.containerWidth = t.$container.outerWidth(!1), t.visible = b(t), t.perPage = t.paged ? 1 : t.visible, t.itemMarginLeft = parseInt(t.$items.eq(0).css("marginLeft")), t.itemMarginRight = parseInt(t.$items.eq(0).css("marginRight")), t.itemMargin = t.itemMarginLeft + t.itemMarginRight, isNaN(t.itemMargin) && (t.itemMargin = 0), t.itemWidth = (t.containerWidth - t.itemMargin * (t.visible - 1)) / t.visible, t.itemHeight = 0, t.pageWidth = t.paged ? t.itemWidth : t.containerWidth, t.matchWidth) t.canisterWidth = t.single ? t.containerWidth : (t.itemWidth + t.itemMargin) * t.count;else for (t.canisterWidth = 0, t.$canister.css({ width: 1e6 }), i = 0; i < t.count; i++) {
                t.canisterWidth += t.$items.eq(i).outerWidth(!0);
            }t.$canister.css({ width: t.canisterWidth, height: "" }), t.$items.css({ width: t.matchWidth ? t.itemWidth : "", height: "" }).removeClass([X.visible, X.item_previous, X.item_next].join(" ")), t.pages = [];var r,
                l = 0,
                c = 0,
                d = 0;for (a = 0, s = 0, n = e(), i = 0; i < t.count; i++) {
                r = t.$items.eq(i), l = t.matchWidth ? t.itemWidth + t.itemMargin : r.outerWidth(!0), c = r.outerHeight(), a + l > t.containerWidth + t.itemMargin && (o = (t.rtl ? n.eq(n.length - 1) : n.eq(0)).position().left, t.pages.push({ left: t.rtl ? o - (t.canisterWidth - a) : o, height: s, width: a, $items: n }), n = e(), s = 0, a = 0), n = n.add(r), a += l, d += l, c > s && (s = c), s > t.itemHeight && (t.itemHeight = s);
            }t.rtl ? n.eq(n.length - 1) : n.eq(0), o = t.canisterWidth - t.containerWidth - (t.rtl ? t.itemMarginLeft : t.itemMarginRight), t.pages.push({ left: t.rtl ? -o : o, height: s, width: a, $items: n }), t.pageCount = t.pages.length, t.paged && (t.pageCount -= t.count % t.visible), t.pageCount <= 0 && (t.pageCount = 1), t.maxMove = -t.pages[t.pageCount - 1].left, t.autoHeight ? t.$canister.css({ height: t.pages[0].height }) : t.matchHeight && t.$items.css({ height: t.itemHeight });var u = "";for (i = 0; i < t.pageCount; i++) {
                u += '<button type="button" class="' + X.page + '">' + (i + 1) + "</button>";
            }t.$pagination.html(u), t.pageCount <= 1 ? f(t) : v(t), t.$paginationItems = t.$pagination.find(L.page), h(t, t.index, !1), setTimeout(function () {
                t.$el.addClass(X.animated);
            }, 5);
        }
    }function o(e) {
        e.$items = e.$canister.children().not(":hidden").addClass(X.item), e.$images = e.$canister.find("img"), e.totalImages = e.$images.length;
    }function r(e, t) {
        e.$images.off(H.namespace), !1 !== t && e.$canister.html(t), e.index = 0, o(e), s.call(this, e);
    }function l(e, t, i, n, a) {
        e.enabled && (N.clearTimer(e.autoTimer), void 0 === a && (a = !0), h(e, t - 1, a, i, n));
    }function c(e) {
        var t = e.index - 1;e.infinite && t < 0 && (t = e.pageCount - 1), h(e, t);
    }function d(e) {
        var t = e.index + 1;e.infinite && t >= e.pageCount && (t = 0), h(e, t);
    }function u(e) {
        var t = e.data;t.resizeTimer = N.startTimer(t.resizeTimer, 1, function () {
            s.call(t.$el, t);
        });
    }function m(e) {
        var t = e.index + 1;t >= e.pageCount && (t = 0), h(e, t);
    }function g(t) {
        N.killEvent(t);var i = t.data,
            n = i.index + (e(t.currentTarget).hasClass(X.control_next) ? 1 : -1);N.clearTimer(i.autoTimer), h(i, n);
    }function p(t) {
        N.killEvent(t);var i = t.data,
            n = i.$paginationItems.index(e(t.currentTarget));N.clearTimer(i.autoTimer), h(i, n);
    }function h(t, i, n, a, s) {
        if (i < 0 && (i = t.infinite ? t.pageCount - 1 : 0), i >= t.pageCount && (i = t.infinite ? 0 : t.pageCount - 1), !(t.count < 1)) {
            t.pages[i] && (t.leftPosition = -t.pages[i].left), t.leftPosition = _(t, t.leftPosition), t.useMargin ? t.$canister.css({ marginLeft: t.leftPosition }) : !1 === n ? (t.$canister.css(G, "none").css(E, "translateX(" + t.leftPosition + "px)"), setTimeout(function () {
                t.$canister.css(G, "");
            }, 5)) : t.$canister.css(E, "translateX(" + t.leftPosition + "px)"), t.$items.removeClass([X.visible, X.item_previous, X.item_next].join(" "));for (var o = 0, r = t.pages.length; o < r; o++) {
                o === i ? t.pages[o].$items.addClass(X.visible).attr("aria-hidden", "false") : t.pages[o].$items.not(t.pages[i].$items).addClass(o < i ? X.item_previous : X.item_next).attr("aria-hidden", "true");
            }t.autoHeight && t.$canister.css({ height: t.pages[i].height }), !1 !== n && !0 !== a && i !== t.index && (t.infinite || i > -1 && i < t.pageCount) && t.$el.trigger(H.update, [i]), t.index = i, t.linked && !0 !== s && e(t.linked).not(t.$el)[y]("jumpPage", t.index + 1, !0, !0), $(t);
        }
    }function f(e) {
        e.$controls.removeClass(X.visible), e.$controlItems.removeClass(X.visible), e.$pagination.removeClass(X.visible);
    }function v(e) {
        e.$controls.addClass(X.visible), e.$controlItems.addClass(X.visible), e.$pagination.addClass(X.visible);
    }function $(e) {
        e.$paginationItems.removeClass(X.active).eq(e.index).addClass(X.active), e.infinite ? e.$controlItems.addClass(X.visible) : e.pageCount < 1 ? e.$controlItems.removeClass(X.visible) : (e.$controlItems.addClass(X.visible), e.index <= 0 ? e.$controlPrevious.removeClass(X.visible) : (e.index >= e.pageCount - 1 || !e.single && e.leftPosition === e.maxMove) && e.$controlNext.removeClass(X.visible));
    }function b(i) {
        var n = 1;if (i.single) return n;if ("array" === e.type(i.show)) for (var a in i.show) {
            i.show.hasOwnProperty(a) && (t.support.matchMedia ? i.show[a].mq.matches && (n = i.show[a].count) : i.show[a].width < t.fallbackWidth && (n = i.show[a].count));
        } else n = i.show;return i.fill && i.count < n ? i.count : n;
    }function C(t, i) {
        var n = t.data;if (N.clearTimer(n.autoTimer), !n.single) {
            if (n.useMargin) n.leftPosition = parseInt(n.$canister.css("marginLeft"));else {
                var a = n.$canister.css(E).split(",");n.leftPosition = parseInt(a[4]);
            }if (n.$canister.css(G, "none").css("will-change", "transform"), x(t), n.linked && !0 !== i) {
                var s = t.deltaX / n.pageWidth;n.rtl && (s *= -1), e(n.linked).not(n.$el)[y]("panStart", s);
            }
        }n.isTouching = !0;
    }function x(t, i) {
        var n = t.data;if (!n.single && (n.touchLeft = _(n, n.leftPosition + t.deltaX), n.useMargin ? n.$canister.css({ marginLeft: n.touchLeft }) : n.$canister.css(E, "translateX(" + n.touchLeft + "px)"), n.linked && !0 !== i)) {
            var a = t.deltaX / n.pageWidth;n.rtl && (a *= -1), e(n.linked).not(n.$el)[y]("pan", a);
        }
    }function w(t, i) {
        var n = t.data,
            a = Math.abs(t.deltaX),
            s = k(n, t),
            o = !1;if (n.didPan = !1, 0 == s) o = n.index;else {
            if (!n.single) {
                var r,
                    l,
                    c = Math.abs(n.touchLeft),
                    d = !1,
                    u = n.rtl ? "right" : "left";if (t.directionX === u) for (r = 0, l = n.pages.length; r < l; r++) {
                    d = n.pages[r], c > Math.abs(d.left) + 20 && (o = r + 1);
                } else for (r = n.pages.length - 1, l = 0; r >= l; r--) {
                    d = n.pages[r], c < Math.abs(d.left) && (o = r - 1);
                }
            }!1 === o && (o = a < 50 ? n.index : n.index + s);
        }o !== n.index && (n.didPan = !0), n.linked && !0 !== i && e(n.linked).not(n.$el)[y]("panEnd", o), P(n, o);
    }function T(t, i) {
        var n = t.data,
            a = k(n, t),
            s = n.index + a;n.linked && !0 !== i && e(n.linked).not(n.$el)[y]("swipe", t.directionX), P(n, s);
    }function P(e, t) {
        e.$canister.css(G, "").css("will-change", ""), h(e, t), e.isTouching = !1;
    }function M(t) {
        var i = t.data,
            n = e(t.currentTarget);if (!i.didPan && (n.trigger(H.itemClick), i.controller)) {
            var a = i.$items.index(n);I(t, a), i.$subordinate[y]("jumpPage", a + 1, !0);
        }
    }function W(t) {
        var i = t.data;if (i.enabled && !i.isTouching) {
            N.clearTimer(i.autoTimer), i.$container.scrollLeft(0);var n,
                a = e(t.target);a.hasClass(X.item) ? n = a : a.parents(L.item).length && (n = a.parents(L.item).eq(0));for (var s = 0; s < i.pageCount; s++) {
                if (i.pages[s].$items.is(n)) {
                    h(i, s);break;
                }
            }
        }
    }function I(e, t) {
        var i = e.data;if (i.controller) {
            var n = i.$items.eq(t);i.$items.removeClass(X.active), n.addClass(X.active);for (var a = 0; a < i.pageCount; a++) {
                if (i.pages[a].$items.is(n)) {
                    h(i, a, !0, !0);break;
                }
            }
        }
    }function _(e, t) {
        return isNaN(t) ? t = 0 : e.rtl ? (t > e.maxMove && (t = e.maxMove), t < 0 && (t = 0)) : (t < e.maxMove && (t = e.maxMove), t > 0 && (t = 0)), t;
    }function k(e, t) {
        return Math.abs(t.deltaX) < Math.abs(t.deltaY) ? 0 : e.rtl ? "right" === t.directionX ? 1 : -1 : "left" === t.directionX ? 1 : -1;
    }var q = t.Plugin("carousel", { widget: !0, defaults: { autoAdvance: !1, autoHeight: !1, autoTime: 8e3, contained: !0, controls: !0, customClass: "", fill: !1, infinite: !1, labels: { next: "Next", previous: "Previous", controls: "Carousel {guid} Controls", pagination: "Carousel {guid} Pagination" }, matchHeight: !1, matchWidth: !0, maxWidth: 1 / 0, minWidth: "0px", paged: !1, pagination: !0, rtl: !1, show: 1, single: !1, theme: "fs-light", useMargin: !1 }, classes: ["ltr", "rtl", "viewport", "wrapper", "container", "canister", "item", "item_previous", "item_next", "controls", "controls_custom", "control", "control_previous", "control_next", "pagination", "page", "animated", "enabled", "visible", "active", "auto_height", "contained", "single"], events: { itemClick: "itemClick", update: "update" }, methods: { _construct: function _construct(s) {
                var r;s.didPan = !1, s.carouselClasses = [X.base, s.theme, s.customClass, s.rtl ? X.rtl : X.ltr], s.maxWidth = s.maxWidth === 1 / 0 ? "100000px" : s.maxWidth, s.mq = "(min-width:" + s.minWidth + ") and (max-width:" + s.maxWidth + ")", s.customControls = "object" === e.type(s.controls) && s.controls.previous && s.controls.next, s.customPagination = "string" === e.type(s.pagination), s.id = this.attr("id"), s.id ? s.ariaId = s.id : (s.ariaId = s.rawGuid, this.attr("id", s.ariaId)), t.support.transform || (s.useMargin = !0);var l = "",
                    c = "",
                    d = [X.control, X.control_previous].join(" "),
                    u = [X.control, X.control_next].join(" ");s.controls && !s.customControls && (s.labels.controls = s.labels.controls.replace("{guid}", s.numGuid), l += '<div class="' + X.controls + '" aria-label="' + s.labels.controls + '" aria-controls="' + s.ariaId + '">', l += '<button type="button" class="' + d + '" aria-label="' + s.labels.previous + '">' + s.labels.previous + "</button>", l += '<button type="button" class="' + u + '" aria-label="' + s.labels.next + '">' + s.labels.next + "</button>", l += "</div>"), s.pagination && !s.customPagination && (s.labels.pagination = s.labels.pagination.replace("{guid}", s.numGuid), c += '<div class="' + X.pagination + '" aria-label="' + s.labels.pagination + '" aria-controls="' + s.ariaId + '" role="navigation">', c += "</div>"), s.autoHeight && s.carouselClasses.push(X.auto_height), s.contained && s.carouselClasses.push(X.contained), s.single && s.carouselClasses.push(X.single), this.addClass(s.carouselClasses.join(" ")).wrapInner('<div class="' + X.wrapper + '" aria-live="polite"><div class="' + X.container + '"><div class="' + X.canister + '"></div></div></div>').append(l).wrapInner('<div class="' + X.viewport + '"></div>').append(c), s.$viewport = this.find(L.viewport).eq(0), s.$container = this.find(L.container).eq(0), s.$canister = this.find(L.canister).eq(0), s.$pagination = this.find(L.pagination).eq(0), s.$controlPrevious = s.$controlNext = e(""), s.customControls ? (s.$controls = e(s.controls.container).addClass([X.controls, X.controls_custom].join(" ")), s.$controlPrevious = e(s.controls.previous).addClass(d), s.$controlNext = e(s.controls.next).addClass(u)) : (s.$controls = this.find(L.controls).eq(0), s.$controlPrevious = s.$controls.find(L.control_previous), s.$controlNext = s.$controls.find(L.control_next)), s.$controlItems = s.$controlPrevious.add(s.$controlNext), s.customPagination && (s.$pagination = e(s.pagination).addClass([X.pagination])), s.$paginationItems = s.$pagination.find(L.page), s.index = 0, s.enabled = !1, s.leftPosition = 0, s.autoTimer = null, s.resizeTimer = null;var m = this.data(j + "-linked");s.linked = !!m && "[data-" + j + '-linked="' + m + '"]', s.linked && (s.paged = !0);var g = this.data(j + "-controller-for") || "";if (s.$subordinate = e(g), s.$subordinate.length && (s.controller = !0), "object" === e.type(s.show)) {
                    var p = s.show,
                        h = [],
                        f = [];for (r in p) {
                        p.hasOwnProperty(r) && f.push(r);
                    }f.sort(N.sortAsc);for (r in f) {
                        f.hasOwnProperty(r) && h.push({ width: parseInt(f[r]), count: p[f[r]], mq: window.matchMedia("(min-width: " + parseInt(f[r]) + "px)") });
                    }s.show = h;
                }o(s), e.fsMediaquery("bind", s.rawGuid, s.mq, { enter: function enter() {
                        a.call(s.$el, s);
                    }, leave: function leave() {
                        n.call(s.$el, s);
                    } }), i(), s.carouselClasses.push(X.enabled), s.carouselClasses.push(X.animated);
            }, _destruct: function _destruct(t) {
                N.clearTimer(t.autoTimer), N.clearTimer(t.resizeTimer), n.call(this, t), e.fsMediaquery("unbind", t.rawGuid), t.id !== t.ariaId && this.removeAttr("id"), t.$controlItems.removeClass([L.control, X.control_previous, L.control_next, L.visible].join(" ")).off(H.namespace), t.$images.off(H.namespace), t.$canister.fsTouch("destroy"), t.$items.removeClass([X.item, X.visible, L.item_previous, L.item_next].join(" ")).unwrap().unwrap().unwrap().unwrap(), t.controls && !t.customControls && t.$controls.remove(), t.customControls && t.$controls.removeClass([X.controls, X.controls_custom, X.visible].join(" ")), t.pagination && !t.customPagination && t.$pagination.remove(), t.customPagination && t.$pagination.html("").removeClass([X.pagination, X.visible].join(" ")), this.removeClass(t.carouselClasses.join(" ")), i();
            }, _resize: function _resize(e) {
                N.iterate.call(z, s);
            }, disable: n, enable: a, jump: l, previous: c, next: d, jumpPage: l, previousPage: c, nextPage: d, jumpItem: function jumpItem(e, t, i, n, a) {
                if (e.enabled) {
                    N.clearTimer(e.autoTimer);var s = e.$items.eq(t - 1);void 0 === a && (a = !0);for (var o = 0; o < e.pageCount; o++) {
                        if (e.pages[o].$items.is(s)) {
                            h(e, o, a, i, n);break;
                        }
                    }
                }
            }, reset: function reset(e) {
                e.enabled && r.call(this, e, !1);
            }, resize: s, update: r, panStart: function panStart(e, t) {
                if (N.clearTimer(e.autoTimer), !e.single) {
                    if (e.rtl && (t *= -1), e.useMargin) e.leftPosition = parseInt(e.$canister.css("marginLeft"));else {
                        var i = e.$canister.css(E).split(",");e.leftPosition = parseInt(i[4]);
                    }e.$canister.css(G, "none"), x({ data: e, deltaX: e.pageWidth * t }, !0);
                }e.isTouching = !0;
            }, pan: function pan(e, t) {
                if (!e.single) {
                    e.rtl && (t *= -1);var i = e.pageWidth * t;e.touchLeft = _(e, e.leftPosition + i), e.useMargin ? e.$canister.css({ marginLeft: e.touchLeft }) : e.$canister.css(E, "translateX(" + e.touchLeft + "px)");
                }
            }, panEnd: function panEnd(e, t) {
                P(e, t);
            }, swipe: function swipe(e, t) {
                T({ data: e, directionX: t }, !0);
            } } }),
        j = q.namespace,
        y = q.namespaceClean,
        L = q.classes,
        X = L.raw,
        H = q.events,
        N = q.functions,
        z = [],
        E = t.transform,
        G = t.transition;
});
$(".carousel_1").carousel({
    pagination: false,
    controls: false
});
$(".carousel_2").carousel({
    controls: false,
    pagination: false,
    autoAdvance: true,
    show: {
        "0px": 1,
        "500px": 2,
        "980px": 3
    }
});
