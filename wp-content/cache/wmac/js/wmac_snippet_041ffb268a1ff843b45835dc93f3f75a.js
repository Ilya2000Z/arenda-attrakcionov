!function(e){function o(t){if(n[t])return n[t].exports;var c=n[t]={exports:{},id:t,loaded:!1};return e[t].call(c.exports,c,c.exports,o),c.loaded=!0,c.exports}var n={};return o.m=e,o.c=n,o.p="",o(0)}([function(e,o,n){e.exports=n(1)},function(e,o){!function(){var e=[544,768,992,1200],o=["vce-hero-section-media--sm","vce-hero-section-media--md","vce-hero-section-media--lg","vce-hero-section-media--xl"],n=function(){var n=Array.prototype.slice.call(document.querySelectorAll(".vce-hero-section-container"));n.forEach(function(n){e.forEach(function(e,t){n.getBoundingClientRect().width>e?n.classList.contains(o[t])||n.classList.add(o[t]):n.classList.contains(o[t])&&n.classList.remove(o[t])})})};window.vcv.on("ready",function(){n(),window.addEventListener("resize",n)}),window.vcv.on("heroSectionReady",n)}()}]);