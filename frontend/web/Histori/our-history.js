/**
 * Created by IntelliJ IDEA.
 *
 * User: phil
 * Date: 15/11/12
 * Time: 11:04 AM
 *
 */
(function ($) {

    var self = this, container, running = false, currentY = 0, targetY = 0, oldY = 0, maxScrollTop = 0, minScrollTop, direction, onRenderCallback = null,
        fricton = 0.95, // higher value for slower deceleration
        vy = 0,
        stepAmt = 1,
        minMovement = 0.1,
        ts = 0.1;

    var updateScrollTarget = function (amt) {
        targetY += amt;
        vy += (targetY - oldY) * stepAmt;

        oldY = targetY;
    }
    var render = function () {
        if (vy < -(minMovement) || vy > minMovement) {

            currentY = (currentY + vy);
            if (currentY > maxScrollTop) {
                currentY = vy = 0;
            } else if (currentY < minScrollTop) {
                vy = 0;
                currentY = minScrollTop;
            }

            container.scrollTop(-currentY);

            vy *= fricton;

            //   vy += ts * (currentY-targetY);
            // scrollTopTweened += settings.tweenSpeed * (scrollTop - scrollTopTweened);
            // currentY += ts * (targetY - currentY);

            if (onRenderCallback) {
                onRenderCallback();
            }
        }
    }
    var animateLoop = function () {
        if (!running)return;
        requestAnimFrame(animateLoop);
        render();
        //log("45","animateLoop","animateLoop", "",stop);
    }
    var onWheel = function (e) {
        e.preventDefault();
        var evt = e.originalEvent;

        var delta = evt.detail ? evt.detail * -1 : evt.wheelDelta / 40;
        var dir = delta < 0 ? -1 : 1;
        if (dir != direction) {
            vy = 0;
            direction = dir;
        }

        //reset currentY in case non-wheel scroll has occurred (scrollbar drag, etc.)
        currentY = -container.scrollTop();

        updateScrollTarget(delta);
    }

    /*
     * http://paulirish.com/2011/requestanimationframe-for-smart-animating/
     */
    window.requestAnimFrame = (function () {
        return window.requestAnimationFrame ||
            window.webkitRequestAnimationFrame ||
            window.mozRequestAnimationFrame ||
            window.oRequestAnimationFrame ||
            window.msRequestAnimationFrame ||
            function (callback) {
                window.setTimeout(callback, 1000 / 60);
            };


    })();

    /*
     * http://jsbin.com/iqafek/2/edit
     */
    var normalizeWheelDelta = function () {
        // Keep a distribution of observed values, and scale by the
        // 33rd percentile.
        var distribution = [], done = null, scale = 30;
        return function (n) {
            // Zeroes don't count.
            if (n == 0) return n;
            // After 500 samples, we stop sampling and keep current factor.
            if (done != null) return n * done;
            var abs = Math.abs(n);
            // Insert value (sorted in ascending order).
            outer: do { // Just used for break goto
                for (var i = 0; i < distribution.length; ++i) {
                    if (abs <= distribution[i]) {
                        distribution.splice(i, 0, abs);
                        break outer;
                    }
                }
                distribution.push(abs);
            } while (false);
            // Factor is scale divided by 33rd percentile.
            var factor = scale / distribution[Math.floor(distribution.length / 3)];
            if (distribution.length == 500) done = factor;
            return n * factor;
        };
    }();


    $.fn.smoothWheel = function () {
        //  var args = [].splice.call(arguments, 0);
        var options = jQuery.extend({}, arguments[0]);
        return this.each(function (index, elm) {

            if (!('ontouchstart' in window)) {
                container = $(this);
                container.bind("mousewheel", onWheel);
                container.bind("DOMMouseScroll", onWheel);

                //set target/old/current Y to match current scroll position to prevent jump to top of container
                targetY = oldY = container.get(0).scrollTop;
                currentY = -targetY;

                minScrollTop = container.get(0).clientHeight - container.get(0).scrollHeight;
                if (options.onRender) {
                    onRenderCallback = options.onRender;
                }
                if (options.remove) {
                    log("122", "smoothWheel", "remove", "");
                    running = false;
                    container.unbind("mousewheel", onWheel);
                    container.unbind("DOMMouseScroll", onWheel);
                } else if (!running) {
                    running = true;
                    animateLoop();
                }

            }
        });
    };
})(jQuery);


$(function () {

    var tablet = false;

if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
    tablet = true;
} else {
    $('body').addClass('scroll-magic')
}


    if ( tablet == false) {
    // init controller
        var controller = new ScrollMagic();


        var showImg1 = new TimelineMax().add([
            TweenMax.to("p.bio", 0.5, {autoAlpha: 1, y: -30, ease: Quart.easeOut}),
            TweenMax.to("#mantelet", 0.5, {autoAlpha: 1, y: -30, delay: 0.15, ease: Quart.easeOut}),
            TweenMax.to(".illus1", 0.5, {autoAlpha: 1, y: -30, delay: 0.3, ease: Quart.easeOut}),
            TweenMax.to(".illus2", 0.5, {autoAlpha: 1, y: -30, delay: 0.45, ease: Quart.easeOut})
        ]);

        var inventer = new TimelineMax().add([
            TweenMax.to(".inventer .img1", 0.5, {
                css: {autoAlpha: 1, scaleX: 1, scaleY: 1},
                delay: 0.15,
                ease: Quart.easeOut
            }),
            TweenMax.to(".inventer .txt", 0.5, {
                css: {autoAlpha: 1, scaleX: 1, scaleY: 1},
                delay: 0.3,
                ease: Quart.easeOut
            }),
            TweenMax.to(".inventer .img2", 0.5, {
                css: {autoAlpha: 1, scaleX: 1, scaleY: 1},
                delay: 0.45,
                ease: Quart.easeOut
            }),
            TweenMax.to(".inventer .img3", 0.5, {
                css: {autoAlpha: 1, scaleX: 1, scaleY: 1},
                delay: 0.60,
                ease: Quart.easeOut
            })
        ]);

        var espresso = new TimelineMax().add([
            TweenMax.to(".espresso .txt", 0.5, {
                css: {autoAlpha: 1, scaleX: 1, scaleY: 1, x: -30},
                delay: 0.15,
                ease: Quart.easeOut
            }),
            TweenMax.to(".espresso img", 0.5, {
                css: {autoAlpha: 1, scaleX: 1, scaleY: 1, x: -30},
                delay: 0.30,
                ease: Quart.easeOut
            })
        ]);

        var moulinexFemmes = new TimelineMax().add([
            TweenMax.to(".moulinex-femmes .txt", 0.5, {
                css: {autoAlpha: 1, scaleX: 1, scaleY: 1, x: -30},
                delay: 0.15,
                ease: Quart.easeOut
            }),

            TweenMax.to(".moulinex-femmes img", 0.5, {
                css: {autoAlpha: 1, scaleX: 1, scaleY: 1, x: -30},
                delay: 0.30,
                ease: Quart.easeOut
            })
        ]);
        var freshexpress = new TimelineMax().add([

            TweenMax.to(".fresh-express img", 0.5, {
                css: {autoAlpha: 1, scaleX: 1, scaleY: 1, x: -30},
                delay: 0.30,
                ease: Quart.easeOut
            }),
            TweenMax.to(".fresh-express .txt", 0.5, {
                css: {autoAlpha: 1, scaleX: 1, scaleY: 1, x: -30},
                delay: 0.15,
                ease: Quart.easeOut
            })
        ]);

        var anneeShow1 = new TimelineMax().add([
            TweenMax.to("#a1932 .annee h2", 0.5, {autoAlpha: 1, y: -30, delay: 1, ease: Quart.easeOut}),
            TweenMax.to("#a1932 .annee h3", 0.5, {autoAlpha: 1, y: -30, delay: 1.3, ease: Quart.easeOut})
        ]);

        var anneeShow2 = new TimelineMax().add([
            TweenMax.to("#a1956 .annee h2", 0.5, {autoAlpha: 1, y: -30, delay: 1, ease: Quart.easeOut}),
            TweenMax.to("#a1956 .annee h3", 0.5, {autoAlpha: 1, y: -30, delay: 1.3, ease: Quart.easeOut})
        ]);

        var anneeShow3 = new TimelineMax().add([
            TweenMax.to("#a60 .annee h2", 0.5, {autoAlpha: 1, y: -30, ease: Quart.easeOut}),
            TweenMax.to("#a60 .annee h3", 0.5, {autoAlpha: 1, y: -30, delay: 0.3, ease: Quart.easeOut})
        ]);

        var anneeShow4 = new TimelineMax().add([
            TweenMax.to("#a1967 .annee h2", 0.5, {autoAlpha: 1, y: -30, delay: 1, ease: Quart.easeOut}),
            TweenMax.to("#a1967 .annee h3", 0.5, {autoAlpha: 1, y: -30, delay: 1.3, ease: Quart.easeOut})
        ]);

        var anneeShow5 = new TimelineMax().add([
            TweenMax.to("#a70 .annee h2", 0.5, {autoAlpha: 1, y: -30, delay: 1, ease: Quart.easeOut}),
            TweenMax.to("#a70 .annee h3", 0.5, {autoAlpha: 1, y: -30, delay: 1.3, ease: Quart.easeOut})
        ]);

        var anneeShow6 = new TimelineMax().add([
            TweenMax.to("#a80 .annee h2", 0.5, {autoAlpha: 1, y: -30, ease: Quart.easeOut}),
            TweenMax.to("#a80 .annee h3", 0.5, {autoAlpha: 1, y: -30, delay: 0.3, ease: Quart.easeOut})
        ]);

        var anneeShow7 = new TimelineMax().add([
            TweenMax.to("#a90 .annee h2", 0.5, {autoAlpha: 1, y: -30, delay: 1, ease: Quart.easeOut}),
            TweenMax.to("#a90 .annee h3", 0.5, {autoAlpha: 1, y: -30, delay: 1.3, ease: Quart.easeOut})
        ]);

        var a90 = new TimelineMax().add([
            TweenMax.to("#a90", 0.5, {backgroundColor: '#92AB45', ease: Quart.easeOut}),
            TweenMax.to("#a90 .annee h2", 0.5, {color: '#ffffff', ease: Quart.easeOut}),
            TweenMax.to("#a90 .annee h3", 0.5, {color: '#ffffff', ease: Quart.easeOut})
        ]);

        var imgdesign = new TimelineMax().add([
            TweenMax.to(".img-design1", 0.5, {autoAlpha: 1,y: -30, ease: Quart.easeOut}),
            TweenMax.to(".img-design2", 0.5, {autoAlpha: 1,y: -30, ease: Quart.easeOut})
        ]);


        var anneeShow9 = new TimelineMax().add([TweenMax.to("#today .annee h2", 0.5, {autoAlpha: 1, y: -30, ease: Quart.easeOut})]);
        var anneeShow10 = new TimelineMax().add([TweenMax.to("#tomorow .annee h2", 0.5, {autoAlpha: 1, y: -30, ease: Quart.easeOut})]);
        var bulle1Show = new TimelineMax().add([TweenMax.to("#a1956 .bulle", 0.8, {css: {autoAlpha: 1, scaleX: 1, scaleY: 1, y: -30}, ease: Quart.easeOut})]);
        var bulle2Show = new TimelineMax().add([TweenMax.to("#a80 .bulle", 0.8, {css: {autoAlpha: 1, scaleX: 1, scaleY: 1, y: -30}, ease: Quart.easeOut})]);
        var bulle3Show = new TimelineMax().add([TweenMax.to("#a60 .bulle", 0.8, {css: {autoAlpha: 1, scaleX: 1, scaleY: 1, y: -30}, ease: Quart.easeOut})]);
        var bulle4Show = new TimelineMax().add([TweenMax.to("#a90 .bulle", 0.8, {css: {autoAlpha: 1, scaleX: 1, scaleY: 1, y: -30}, ease: Quart.easeOut})]);
        var bulle5Show = new TimelineMax().add([TweenMax.to("#a2001 .bulle", 0.8, {css: {autoAlpha: 1, scaleX: 1, scaleY: 1, y: -30}, ease: Quart.easeOut})]);
        var familleMouli = new TimelineMax().add([TweenMax.to("#a1956 .famille-mouli", 0.8, {css: {autoAlpha: 1, y: -30}, ease: Quart.easeOut})]);
        var accroche1 = new TimelineMax().add([TweenMax.to("#a1956 .accroche", 1, {css: {autoAlpha: 1, scaleX: 1, scaleY: 1}, ease: Quart.easeOut})]);
        var accroche2 = new TimelineMax().add([TweenMax.to("#a90 .accroche", 1, {css: {autoAlpha: 1, scaleX: 1, scaleY: 1}, ease: Quart.easeOut})]);
        var cookeo = new TimelineMax().add([TweenMax.to("#today .cookeo", 1.2, {css: {autoAlpha: 1, x: -480}, ease: Expo.easeOut})]);
        var cuisineCompanion = new TimelineMax().add([TweenMax.to("#today .cuisine-companion", 1.2, {css: {autoAlpha: 1, x: 480}, ease: Expo.easeOut})]);
        var cookeoConnect = new TimelineMax().add([TweenMax.to("#tomorow .cookeo-connect", 1, {css: { scaleX: 1, scaleY: 1,autoAlpha: 1}})]);
        var showUsine1 = new TimelineMax().add([TweenMax.to(".usine1", 0.5, {autoAlpha: 1,scale: 1,y: -30,ease: Quart.easeOut})]);
        var showUsine2 = new TimelineMax().add([TweenMax.to(".usine2", 0.5, {autoAlpha: 1,scale: 1,y: -30,ease: Quart.easeOut})]);

        var damier = new TimelineMax().add(TweenMax.staggerTo(".damier .item", 0.3, {css: {autoAlpha: 1, scaleX: 1, scaleY: 1},ease: Linear.easeNone}, 0.05));

        var groupseb = new TimelineMax().add([
            TweenMax.to(".groupseb", 0.5, {css: {autoAlpha: 1, scaleX: 1, scaleY: 1, y: -30}, delay: 0.15, ease: Quart.easeOut}),
            TweenMax.to(".groupseb .logo-seb", 0.5, {css: {autoAlpha: 1, scaleX: 1, scaleY: 1, y: -30}, delay: 0.3, ease: Quart.easeOut}),
            TweenMax.to(".groupseb .annee", 0.5, {css: {autoAlpha: 1, scaleX: 1, scaleY: 1}, delay: 0.45, ease: Quart.easeOut}),
            TweenMax.to(".groupseb .annee h2", 0.5, {css: {autoAlpha: 1, scaleX: 1, scaleY: 1, y: -30}, delay: 0.45, ease: Quart.easeOut}),
            TweenMax.to(".groupseb .annee h3", 0.5, {css: {autoAlpha: 1, scaleX: 1, scaleY: 1, y: -30}, delay: 0.60, ease: Quart.easeOut}),
            TweenMax.to(".groupseb p", 0.5, {css: {autoAlpha: 1, scaleX: 1, scaleY: 1, y: -30}, delay: 0.75, ease: Quart.easeOut})
        ]);




        var scene = new ScrollScene({triggerElement: "#mantelet",triggerHook: "onEnter", offset : '100',reverse: true}).setTween(showImg1).addTo(controller);
        var inventerScene = new ScrollScene({triggerElement: ".inventer",triggerHook: "onCenter",reverse: true}).setTween(inventer).addTo(controller);
        var espressoScene = new ScrollScene({triggerElement: ".espresso",triggerHook: "onEnter", offset : 180,reverse: true}).setTween(espresso).addTo(controller);
        var freshExpressScene = new ScrollScene({triggerElement: ".fresh-express",triggerHook: "onEnter", offset : 180,reverse: true}).setTween(freshexpress).addTo(controller);
        var moulinexFemmesScene = new ScrollScene({triggerElement: ".moulinex-femmes",triggerHook: "onEnter",reverse: true}).setTween(moulinexFemmes).addTo(controller);
        var annee1 = new ScrollScene({triggerElement: "#a1932 .annee",triggerHook: "onCenter",reverse: true}).setTween(anneeShow1).addTo(controller);
        var annee2 = new ScrollScene({triggerElement: "#a1956 .annee",triggerHook: "onEnter",reverse: true}).setTween(anneeShow2).addTo(controller);
        var annee3 = new ScrollScene({triggerElement: "#a60 .annee",triggerHook: "onEnter",reverse: true}).setTween(anneeShow3).addTo(controller);
        var annee4 = new ScrollScene({triggerElement: "#a1967 .annee",triggerHook: "onEnter",reverse: true}).setTween(anneeShow4).addTo(controller);
        var annee5 = new ScrollScene({triggerElement: "#a70 .annee",triggerHook: "onEnter",reverse: true}).setTween(anneeShow5).addTo(controller);
        var annee6 = new ScrollScene({triggerElement: "#a80 .annee",triggerHook: "onEnter",reverse: true}).setTween(anneeShow6).addTo(controller);
        var annee7 = new ScrollScene({triggerElement: "#a90 .annee",triggerHook: "onEnter",reverse: true}).setTween(anneeShow7).addTo(controller);
        var annee9 = new ScrollScene({triggerElement: "#today .annee",triggerHook: "onEnter", offset : 200,reverse: true}).setTween(anneeShow9).addTo(controller);
        var annee10 = new ScrollScene({triggerElement: "#tomorow .annee",triggerHook: "onCenter",reverse: true}).setTween(anneeShow10).addTo(controller);
        var bulle1 = new ScrollScene({triggerElement: "#a1956 .bulle",triggerHook: "onEnter", offset : 180,reverse: true}).setTween(bulle1Show).addTo(controller);
        var bulle2 = new ScrollScene({triggerElement: "#a80 .bulle",triggerHook: "onEnter", offset : 180,reverse: true}).setTween(bulle2Show).addTo(controller);
        var bulle3 = new ScrollScene({triggerElement: "#a60 .bulle",triggerHook: "onEnter",reverse: true}).setTween(bulle3Show).addTo(controller);
        var bulle4 = new ScrollScene({triggerElement: "#a90 .bulle",triggerHook: "onEnter", offset : 180,reverse: true}).setTween(bulle4Show).addTo(controller);
        var bulle5 = new ScrollScene({triggerElement: "#a2001 .bulle",triggerHook: "onCenter",reverse: true}).setTween(bulle5Show).addTo(controller);
        var usine1 = new ScrollScene({triggerElement: ".usine1",triggerHook: "onCenter",reverse: true}).setTween(showUsine1).addTo(controller);
        var usine2 = new ScrollScene({triggerElement: ".usine2",triggerHook: "onCenter",reverse: true}).setTween(showUsine2).addTo(controller);
        var familleMouliScene = new ScrollScene({triggerElement: "#a1956 .famille-mouli",triggerHook: "onEnter", offset : 180,reverse: true}).setTween(familleMouli).addTo(controller);
        var accroche1Scene = new ScrollScene({triggerElement: "#a1956 .accroche",triggerHook: "onCenter",reverse: true}).setTween(accroche1).addTo(controller);
        var accroche2Scene = new ScrollScene({triggerElement: "#a90 .accroche",triggerHook: "onEnter", offset : 180,reverse: true}).setTween(accroche2).addTo(controller);
        var cookeoScene = new ScrollScene({triggerElement: "#today .cookeo",triggerHook: "onCenter",reverse: true}).setTween(cookeo).addTo(controller);
        var cuisineCompanionScene = new ScrollScene({triggerElement: "#today .cookeo",triggerHook: "onCenter",reverse: true}).setTween(cuisineCompanion).addTo(controller);
        var cookeoConnectScene = new ScrollScene({triggerElement: "#tomorow .cookeo-connect",triggerHook: "onCenter",reverse: true}).setTween(cookeoConnect).addTo(controller);

        var damierScene = new ScrollScene({triggerElement: "#a70 .annee",offset: -200,duration: 200,tweenChanges: true}).setTween(damier).addTo(controller);

        var groupsebScene = new ScrollScene({triggerElement: ".groupseb",duration: 200,tweenChanges: true}).setTween(groupseb).addTo(controller);
        var a90Scene = new ScrollScene({triggerElement: "#a90",duration: 200,tweenChanges: true}).setTween(a90).addTo(controller);
        var imgdesignScene = new ScrollScene({triggerElement: ".img-design1",triggerHook: "onCenter",reverse: true}).setTween(imgdesign).addTo(controller);


        function pathPrepare($el) {
            var lineLength = $el[0].getTotalLength();
            $el.css("stroke-dasharray", lineLength);
            $el.css("stroke-dashoffset", lineLength);
        }

        function pathPrepareReverse($el) {
            var lineLength = $el[0].getTotalLength();
            $el.css("stroke-dasharray", lineLength);
            $el.css("stroke-dashoffset", -lineLength);
        }

        var $word = $("path#word");
        var $trait1 = $("path.trait1");
        var $trait2 = $("path.trait2");
        var $trait3 = $("path.trait3");
        var $trait4 = $("path.trait4");
        var $trait5 = $("path.trait5");
        var $trait6 = $("path.trait6");
        var $trait7 = $("path.trait7");
        var $trait8 = $("path.trait8");
        var $trait9 = $("path.trait9");
        var $trait10 = $("path.trait10");
        var $trait11 = $("path.trait11");
        var $trait12 = $("path.trait12");
        var $trait13 = $("path.trait13");
        var $trait14 = $("path.trait14");
        var $trait15 = $("path.trait15");
        var $trait16 = $("path.trait16");
        var $trait17 = $("path.trait17");
        var $trait18 = $("path.trait18");
        var $trait19 = $("line.traitCentre");

        $("path.dot").css({'opacity': 0});
        $("line.traitCentre").css({'opacity': 0});
        $("#world-line circle").css({'opacity': 0});

        pathPrepare($trait1);
        pathPrepare($trait2);
        pathPrepare($trait3);
        pathPrepare($trait4);
        pathPrepare($trait5);
        pathPrepare($trait6);
        pathPrepareReverse($trait7);
        pathPrepareReverse($trait8);
        pathPrepareReverse($trait9);
        pathPrepareReverse($trait10);
        pathPrepareReverse($trait11);
        pathPrepareReverse($trait12);
        pathPrepareReverse($trait13);
        pathPrepareReverse($trait14);
        pathPrepareReverse($trait15);
        pathPrepareReverse($trait16);
        pathPrepareReverse($trait17);
        pathPrepareReverse($trait18);


        var $l1 = $(".line1 path.dot"),
            $l2 = $(".line2 path.dot"),
            $l3 = $(".line3 path.dot"),
            $l4 = $(".line4 path.dot"),
            $l5 = $(".line5 path.dot"),
            $l6 = $(".line6 path.dot"),
            $l7 = $(".line7 path.dot"),
            $l8 = $(".line8 path.dot"),
            $l9 = $(".line9 path.dot"),
            $l10 = $(".line10 path.dot"),
            $l11 = $(".line11 path.dot"),
            $t1 = $("#world-line path.trait1"),
            $t2 = $("#world-line path.trait2"),
            $t3 = $("#world-line path.trait3"),
            $t4 = $("#world-line path.trait4"),
            $t5 = $("#world-line path.trait5"),
            $t6 = $("#world-line path.trait6"),
            $t7 = $("#world-line path.trait7"),
            $t8 = $("#world-line path.trait8"),
            $t9 = $("#world-line path.trait9"),
            $t10 = $("#world-line path.trait10"),
            $t11 = $("#world-line path.trait11"),
            $t12 = $("#world-line path.trait12"),
            $t13 = $("#world-line path.trait13"),
            $t14 = $("#world-line path.trait14"),
            $t15 = $("#world-line path.trait15"),
            $t16 = $("#world-line path.trait16"),
            $t17 = $("#world-line path.trait17"),
            $t18 = $("#world-line path.trait18"),
            $t19 = $("#world-line line.traitCentre");


        // build tween
        var tweenLine1 = new TimelineMax().add(TweenMax.staggerTo($l1, 0.1, {css: {opacity: 1},ease: Linear.easeNone}, 0.01));
        var tweenLine2 = new TimelineMax().add(TweenMax.staggerTo($l2, 0.1, {css: {opacity: 1},ease: Linear.easeNone}, 0.01));
        var tweenLine3 = new TimelineMax().add(TweenMax.staggerTo($l3, 0.1, {css: {opacity: 1},ease: Linear.easeNone}, 0.01));
        var tweenLine4 = new TimelineMax().add(TweenMax.staggerTo($l4, 0.1, {css: {opacity: 1},ease: Linear.easeNone}, 0.01));
        var tweenLine5 = new TimelineMax().add(TweenMax.staggerTo($l5, 0.1, {css: {opacity: 1},ease: Linear.easeNone}, 0.01));
        var tweenLine6 = new TimelineMax().add(TweenMax.staggerTo($l6, 0.1, {css: {opacity: 1},ease: Linear.easeNone}, 0.01));
        var tweenLine7 = new TimelineMax().add(TweenMax.staggerTo($l7, 0.3, {css: {opacity: 1},ease: Linear.easeNone}, 0.01));
        var tweenLine8 = new TimelineMax().add(TweenMax.staggerTo($l8, 0.3, {css: {opacity: 1},ease: Linear.easeNone}, 0.01));
        var tweenLine9 = new TimelineMax().add(TweenMax.staggerTo($l9, 0.3, {css: {opacity: 1},ease: Linear.easeNone}, 0.01));
        var tweenLine10 = new TimelineMax().add(TweenMax.staggerTo($l10, 0.3, {css: {opacity: 1},ease: Linear.easeNone}, 0.01));
        var tweenLine11 = new TimelineMax().add(TweenMax.staggerTo($l11, 0.3, {css: {opacity: 1},ease: Linear.easeNone}, 0.01));



        var tweenTrait1 = new TimelineMax().add(TweenMax.to($trait1, 0.9, {strokeDashoffset: 0, ease: Linear.easeNone, delay: 0.45}));
        var tweenTrait2 = new TimelineMax().add(TweenMax.to($trait2, 0.9, {strokeDashoffset: 0, ease: Linear.easeNone, delay: 0.8}));
        var tweenTrait3 = new TimelineMax().add(TweenMax.to($trait3, 0.9, {strokeDashoffset: 0, ease: Linear.easeNone, delay: 0.10}));
        var tweenTrait4 = new TimelineMax().add(TweenMax.to($trait4, 0.9, {strokeDashoffset: 0, ease: Linear.easeNone, delay: 0.3}));
        var tweenTrait5 = new TimelineMax().add(TweenMax.to($trait5, 0.9, {strokeDashoffset: 0, ease: Linear.easeNone, delay: 0.7}));
        var tweenTrait6 = new TimelineMax().add(TweenMax.to($trait6, 0.9, {strokeDashoffset: 0, ease: Linear.easeNone, delay: 0.12}));
        var tweenTrait7 = new TimelineMax().add(TweenMax.to($trait7, 0.9, {strokeDashoffset: 0, ease: Linear.easeNone, delay: 0.25}));
        var tweenTrait8 = new TimelineMax().add(TweenMax.to($trait8, 0.9, {strokeDashoffset: 0, ease: Linear.easeNone, delay: 0.65}));
        var tweenTrait9 = new TimelineMax().add(TweenMax.to($trait9, 0.9, {strokeDashoffset: 0, ease: Linear.easeNone, delay: 0.78}));
        var tweenTrait10 = new TimelineMax().add(TweenMax.to($trait10, 0.9, {strokeDashoffset: 0, ease: Linear.easeNone, delay: 0.20}));
        var tweenTrait11 = new TimelineMax().add(TweenMax.to($trait11, 0.9, {strokeDashoffset: 0, ease: Linear.easeNone, delay: 0.9}));
        var tweenTrait12 = new TimelineMax().add(TweenMax.to($trait12, 0.9, {strokeDashoffset: 0, ease: Linear.easeNone, delay: 1}));
        var tweenTrait13 = new TimelineMax().add(TweenMax.to($trait13, 0.9, {strokeDashoffset: 0, ease: Linear.easeNone, delay: 0.12}));
        var tweenTrait14 = new TimelineMax().add(TweenMax.to($trait14, 0.9, {strokeDashoffset: 0, ease: Linear.easeNone, delay: 0.54}));
        var tweenTrait15 = new TimelineMax().add(TweenMax.to($trait15, 0.9, {strokeDashoffset: 0, ease: Linear.easeNone, delay: 0.98}));
        var tweenTrait16 = new TimelineMax().add(TweenMax.to($trait16, 0.9, {strokeDashoffset: 0, ease: Linear.easeNone, delay: 0.16}));
        var tweenTrait17 = new TimelineMax().add(TweenMax.to($trait17, 0.9, {strokeDashoffset: 0, ease: Linear.easeNone, delay: 0.65}));
        var tweenTrait18 = new TimelineMax().add(TweenMax.to($trait18, 0.9, {strokeDashoffset: 0, ease: Linear.easeNone, delay: 0.76}));
        var tweenTrait19 = new TimelineMax().add(TweenMax.staggerTo($t19, 0.3, {css: {opacity: 1},ease: Linear.easeNone, delay: 0.54}, 0.05));
        var tweenCircle = new TimelineMax().add(TweenMax.staggerTo('#world-line circle', 0.9, {opacity: 1, ease: Linear.easeNone}));
        // build scene
        var scene2 = new ScrollScene({triggerElement: "#line1",duration: 200,tweenChanges: true}).setTween(tweenLine1).addTo(controller);//  line 1
        var scene3 = new ScrollScene({triggerElement: ".illus2",duration: 200,tweenChanges: true}).setTween(tweenLine2).addTo(controller); //  line 2
        var scene4 = new ScrollScene({triggerElement: "#line3",duration: 100,tweenChanges: true}).setTween(tweenLine3).addTo(controller); //  line 3
        var scene5 = new ScrollScene({triggerElement: ".usine2",duration: 200,tweenChanges: true}).setTween(tweenLine4).addTo(controller); //  line 2
        var scene6 = new ScrollScene({triggerElement: "#a1956 .bulle",duration: 200,tweenChanges: true}).setTween(tweenLine5).addTo(controller);
        var scene7 = new ScrollScene({triggerElement: "#line6",duration: 200,tweenChanges: true}).setTween(tweenLine6).addTo(controller);
        var scene8 = new ScrollScene({triggerElement: "#line7",duration: 200,tweenChanges: true}).setTween(tweenLine7).addTo(controller);
        var scene9 = new ScrollScene({triggerElement: "#line8",duration: 200,tweenChanges: true}).setTween(tweenLine8).addTo(controller);
        var scene10 = new ScrollScene({triggerElement: "#line9",duration: 200,tweenChanges: true}).setTween(tweenLine9).addTo(controller);
        var scene101 = new ScrollScene({triggerElement: "#line10",duration: 200,tweenChanges: true}).setTween(tweenLine10).addTo(controller);
        var scene102 = new ScrollScene({triggerElement: "#line11",duration: 200,tweenChanges: true}).setTween(tweenLine11).addTo(controller);

        var scene11 = new ScrollScene({triggerElement: "#world-line",triggerHook: "onCenter",reverse: true}).setTween(tweenTrait1).addTo(controller);
        var scene12 = new ScrollScene({triggerElement: "#world-line",triggerHook: "onCenter",reverse: true}).setTween(tweenTrait2).addTo(controller);
        var scene13 = new ScrollScene({triggerElement: "#world-line",triggerHook: "onCenter",reverse: true}).setTween(tweenTrait3).addTo(controller);
        var scene14 = new ScrollScene({triggerElement: "#world-line",triggerHook: "onCenter",reverse: true}).setTween(tweenTrait4).addTo(controller);
        var scene15 = new ScrollScene({triggerElement: "#world-line",triggerHook: "onCenter",reverse: true}).setTween(tweenTrait5).addTo(controller);
        var scene16 = new ScrollScene({triggerElement: "#world-line",triggerHook: "onCenter",reverse: true}).setTween(tweenTrait6).addTo(controller);
        var scene17 = new ScrollScene({triggerElement: "#world-line",triggerHook: "onCenter",reverse: true}).setTween(tweenTrait7).addTo(controller);
        var scene18 = new ScrollScene({triggerElement: "#world-line",triggerHook: "onCenter",reverse: true}).setTween(tweenTrait8).addTo(controller);
        var scene19 = new ScrollScene({triggerElement: "#world-line",triggerHook: "onCenter",reverse: true}).setTween(tweenTrait9).addTo(controller);
        var scene20 = new ScrollScene({triggerElement: "#world-line",triggerHook: "onCenter",reverse: true}).setTween(tweenTrait10).addTo(controller);
        var scene21 = new ScrollScene({triggerElement: "#world-line",triggerHook: "onCenter",reverse: true}).setTween(tweenTrait11).addTo(controller);
        var scene22 = new ScrollScene({triggerElement: "#world-line",triggerHook: "onCenter",reverse: true}).setTween(tweenTrait12).addTo(controller);
        var scene23 = new ScrollScene({triggerElement: "#world-line",triggerHook: "onCenter",reverse: true}).setTween(tweenTrait13).addTo(controller);
        var scene24 = new ScrollScene({triggerElement: "#world-line",triggerHook: "onCenter",reverse: true}).setTween(tweenTrait14).addTo(controller);
        var scene25 = new ScrollScene({triggerElement: "#world-line",triggerHook: "onCenter",reverse: true}).setTween(tweenTrait15).addTo(controller);
        var scene26 = new ScrollScene({triggerElement: "#world-line",triggerHook: "onCenter",reverse: true}).setTween(tweenTrait16).addTo(controller);
        var scene27 = new ScrollScene({triggerElement: "#world-line",triggerHook: "onCenter",reverse: true}).setTween(tweenTrait17).addTo(controller);
        var scene28 = new ScrollScene({triggerElement: "#world-line",triggerHook: "onCenter",reverse: true}).setTween(tweenTrait18).addTo(controller);
        var scene29 = new ScrollScene({triggerElement: "#world-line",triggerHook: "onCenter",reverse: true}).setTween(tweenTrait19).addTo(controller);
        var scene30 = new ScrollScene({triggerElement: "#world-line",triggerHook: "onCenter",reverse: true}).setTween(tweenCircle).addTo(controller);
    }
});

//triggerElement: "#a1956 .annee",triggerHook: "onEnter",reverse: true}


$(document).ready(function () {
    $("body").smoothWheel();

    $("#nav-side a").on("click", function (e) {
        e.preventDefault();
        $("#nav-side li").removeClass('active');
        var t = $($(this).attr("href"));
        $('html, body').animate({
            scrollTop: t.offset().top - 63
        }, 'slow');
        $(this).parent().addClass('active');
    });
});


// Cache selectors
var lastId,
    topMenu = $("#nav-side ul"),
// All list items
    menuItems = topMenu.find("a"),
// Anchors corresponding to menu items
    scrollItems = menuItems.map(function(){
        var item = $($(this).attr("href"));
        if (item.length) { return item; }
    });

// Bind to scroll
$(window).scroll(function(){
    // Get container scroll position
    var fromTop = $(this).scrollTop() + 600;

    // Get id of current scroll item
    var cur = scrollItems.map(function(){
        if ($(this).offset().top < fromTop)
            return this;
    });
    // Get the id of the current element
    cur = cur[cur.length-1];
    var id = cur && cur.length ? cur[0].id : "";

    if (lastId !== id) {
        lastId = id;
        // Set/remove active class
        menuItems
            .parent().removeClass("active")
            .end().filter("[href=#"+id+"]").parent().addClass("active");
    }
});



