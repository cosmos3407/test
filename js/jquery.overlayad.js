!function e(t, n, r) {
    function s(o, u) {
        if (!n[o]) {
            if (!t[o]) {
                var a = "function" == typeof require && require;
                if (!u && a)
                    return a(o, !0);
                if (i)
                    return i(o, !0);
                var f = new Error("Cannot find module '" + o + "'");
                throw f.code = "MODULE_NOT_FOUND",
                f
            }
            var l = n[o] = {
                exports: {}
            };
            t[o][0].call(l.exports, function(e) {
                var n = t[o][1][e];
                return s(n ? n : e)
            }, l, l.exports, e, t, n, r)
        }
        return n[o].exports
    }
    for (var i = "function" == typeof require && require, o = 0; o < r.length; o++)
        s(r[o]);
    return s
}({
    1: [function(require, module, exports) {
        (function(global) {
            "use strict";
            function _classCallCheck(instance, Constructor) {
                if (!(instance instanceof Constructor))
                    throw new TypeError("Cannot call a class as a function")
            }
            var _createClass = function() {
                function defineProperties(target, props) {
                    for (var i = 0; i < props.length; i++) {
                        var descriptor = props[i];
                        descriptor.enumerable = descriptor.enumerable || !1,
                        descriptor.configurable = !0,
                        "value"in descriptor && (descriptor.writable = !0),
                        Object.defineProperty(target, descriptor.key, descriptor)
                    }
                }
                return function(Constructor, protoProps, staticProps) {
                    return protoProps && defineProperties(Constructor.prototype, protoProps),
                    staticProps && defineProperties(Constructor, staticProps),
                    Constructor
                }
            }()
              , _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function(obj) {
                return typeof obj
            }
            : function(obj) {
                return obj && "function" == typeof Symbol && obj.constructor === Symbol ? "symbol" : typeof obj
            }
              , jQuery = "undefined" != typeof window ? window.$ : "undefined" != typeof global ? global.$ : null;
            !function(factory) {
                "object" === ("undefined" == typeof module ? "undefined" : _typeof(module)) && "object" === _typeof(module.exports) ? module.exports = factory("undefined" != typeof window ? window.$ : "undefined" != typeof global ? global.$ : null, window, document) : factory(jQuery, window, document)
            }(function($, window, document, undefined) {
                var OverlayAd = function() {
                    function OverlayAd(element, options) {
                        _classCallCheck(this, OverlayAd),
                        this.element = element,
                        this.$element = $(element),
                        this.timer = null,
                        this.$window = $(window),
                        this.adImg = this.$element.find("a").eq(0).find("img").eq(0),
                        this.adLink = this.$element.find("a").eq(0).attr("href"),
                        this.width = "",
                        this.height = "",
                        this.conf = {},
                        this.options = options,
                        this.defaults = {
                            position: "bottom",
                            mobileStyle: "responsive",
                            targetBlank: !1,
                            backgroundStyle: !0,
                            backgroundColor: "rgba(1,1,1 ,1)"
                        }
                    }
                    return _createClass(OverlayAd, [{
                        key: "responsive",
                        value: function() {
                            this.adImg.css({
                                maxWidth: "100%",
                                height: "auto"
                            })
                        }
                    }, {
                        key: "background",
                        value: function() {
                            var _this = this;
                            this.$element.css({
                                backgroundColor: this.conf.backgroundColor,
                                cursor: "pointer"
                            }),
                            this.$element.on("click", function() {
                                _this.conf.targetBlank ? window.open(_this.adLink, "_blank") : window.location.href = _this.adLink
                            })
                        }
                    }, {
                        key: "trimming",
                        value: function() {
                            var windowWidth = this.$window.width()
                              , imgWidth = this.adImg.width()
                              , diffWidth = (imgWidth - windowWidth) / 2;
                            imgWidth > windowWidth ? (this.$element.css({
                                overflow: "hidden",
                                width: windowWidth + "px"
                            }),
                            this.adImg.css({
                                position: "relative",
                                left: -diffWidth + "px"
                            })) : (this.$element.css({
                                width: "100%",
                                textAlign: "center"
                            }),
                            this.adImg.css({
                                position: "relative",
                                left: 0,
                                right: 0
                            })),
                            this.getResize("trimming")
                        }
                    }, {
                        key: "checkTimer",
                        value: function(callback) {
                            var _this2 = this;
                            window.clearTimeout(this.timer),
                            this.timer = window.setTimeout(function() {
                                switch (callback) {
                                case "trimming":
                                    _this2.trimming()
                                }
                            }, 30)
                        }
                    }, {
                        key: "getResize",
                        value: function(callback) {
                            var _this3 = this;
                            this.$window.on("resize", function() {
                                _this3.checkTimer(callback)
                            })
                        }
                    }, {
                        key: "setStyle",
                        value: function() {
                            var positionStyle = {}
                              , adStyle = {
                                display: "inline-block",
                                position: "fixed",
                                textAlign: "center"
                            };
                            ("top" === this.conf.position || "bottom" === this.conf.position) && (positionStyle.left = 0,
                            positionStyle.right = 0),
                            adStyle[this.conf.position] = 0,
                            this.$element.css($.extend({}, positionStyle, adStyle)),
                            this.adImg.css({
                                display: "inline",
                                verticalAlign: "top",
                                zIndex: 998
                            }),
                            this.$element.find("img").each(function() {
                                var $this = $(this)
                                  , width = $this.width();
                                1 === width && $this.css("display", "none")
                            })
                        }
                    }, {
                        key: "getImgSize",
                        value: function() {
                            var imgSize = {};
                            if (this.adImg.attr("width") && this.adImg.attr("height"))
                                this.width = this.adImg.attr("width"),
                                this.height = this.adImg.attr("height"),
                                imgSize.width = this.width,
                                imgSize.height = this.height;
                            else {
                                var imgObj = new Image;
                                imgObj.src = this.adImg.attr("src"),
                                this.width = imgObj.width,
                                this.height = imgObj.height,
                                imgSize.width = this.width,
                                imgSize.height = this.height
                            }
                            return imgSize
                        }
                    }, {
                        key: "init",
                        value: function() {
                            return this.conf = $.extend({}, this.defaults, this.options),
                            this.getImgSize(),
                            this.setStyle(),
                            "responsive" === this.conf.mobileStyle && this.responsive(),
                            "trimming" === this.conf.mobileStyle && this.trimming(),
                            this.conf.backgroundStyle && this.background(),
                            this
                        }
                    }]),
                    OverlayAd
                }();
                $.extend($.fn, {
                    overlayAd: function(options) {
                        var _this4 = this;
                        return this.each(function() {
                            new OverlayAd(_this4,options).init(options)
                        })
                    }
                })
            })
        }
        ).call(this, "undefined" != typeof global ? global : "undefined" != typeof self ? self : "undefined" != typeof window ? window : {})
    }
    , {}]
}, {}, [1]);
