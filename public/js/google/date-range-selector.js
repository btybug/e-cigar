!function (t) {
    function e(n) {
        if (a[n])return a[n].exports;
        var i = a[n] = {exports: {}, id: n, loaded: !1};
        return t[n].call(i.exports, i, i.exports, e), i.loaded = !0, i.exports
    }

    var a = {};
    return e.m = t, e.c = a, e.p = "", e(0)
}([function (t, e) {
    "use strict";
    gapi.analytics.ready(function () {
        function t(t) {
            if (n.test(t))return t;
            var i = a.exec(t);
            if (i)return e(+i[1]);
            if ("today" == t)return e(0);
            if ("yesterday" == t)return e(1);
            throw new Error("Cannot convert date " + t)
        }

        function e(t) {
            var e = new Date;
            e.setDate(e.getDate() - t);
            var a = String(e.getMonth() + 1);
            a = 1 == a.length ? "0" + a : a;
            var n = String(e.getDate());
            return n = 1 == n.length ? "0" + n : n, e.getFullYear() + "-" + a + "-" + n
        }

        var a = /(\d+)daysAgo/, n = /\d{4}\-\d{2}\-\d{2}/;
        gapi.analytics.createComponent("DateRangeSelector", {
            execute: function () {
                var e = this.get();
                e["start-date"] = e["start-date"] || "7daysAgo", e["end-date"] = e["end-date"] || "yesterday", this.container = "string" == typeof e.container ? document.getElementById(e.container) : e.container, e.template && (this.template = e.template), this.container.innerHTML = this.template;
                var a = this.container.querySelectorAll("input");
                return this.startDateInput = a[0], this.startDateInput.value = t(e["start-date"]), this.endDateInput = a[1], this.endDateInput.value = t(e["end-date"]), this.setValues(), this.setMinMax(), this.container.onchange = this.onChange.bind(this), this
            },
            onChange: function () {
                this.setValues(), this.setMinMax(), this.emit("change", {
                    "start-date": this["start-date"],
                    "end-date": this["end-date"]
                })
            },
            setValues: function () {
                this["start-date"] = this.startDateInput.value, this["end-date"] = this.endDateInput.value
            },
            setMinMax: function () {
                this.startDateInput.max = this.endDateInput.value, this.endDateInput.min = this.startDateInput.value
            },
            template: '<div class="DateRangeSelector">  <div class="DateRangeSelector-item">    <label>Start Date</label>     <input type="date">  </div>  <div class="DateRangeSelector-item">    <label>End Date</label>     <input type="date">  </div></div>'
        })
    })
}]);
//# sourceMappingURL=date-range-selector.js.map