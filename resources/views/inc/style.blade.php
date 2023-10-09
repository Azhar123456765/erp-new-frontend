<link rel="stylesheet" href="{{ asset('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&amp;display=fallback') }}" />

<link rel="stylesheet" href="{{ asset('../../plugins/fontawesome-free/css/all.min.css') }}" />

<link rel="stylesheet" href="{{ asset('../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}" />
<link rel="stylesheet" href="{{ asset('../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}" />
<link rel="stylesheet" href="{{ asset('../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}" />

<link rel="stylesheet" href="{{ asset('../../dist/css/adminlte.min2167.css?v=3.2.0') }}" />
<script nonce="d4cfe204-cbf9-4890-8e13-ef8d0a90d985">
    (function(w, d) {
        !(function(j, k, l, m) {
            j[l] = j[l] || {};
            j[l].executed = [];
            j.zaraz = {
                deferred: [],
                listeners: []
            };
            j.zaraz.q = [];
            j.zaraz._f = function(n) {
                return async function() {
                    var o = Array.prototype.slice.call(arguments);
                    j.zaraz.q.push({
                        m: n,
                        a: o
                    });
                };
            };
            for (const p of ["track", "set", "debug"]) j.zaraz[p] = j.zaraz._f(p);
            j.zaraz.init = () => {
                var q = k.getElementsByTagName(m)[0],
                    r = k.createElement(m),
                    s = k.getElementsByTagName("title")[0];
                s && (j[l].t = k.getElementsByTagName("title")[0].text);
                j[l].x = Math.random();
                j[l].w = j.screen.width;
                j[l].h = j.screen.height;
                j[l].j = j.innerHeight;
                j[l].e = j.innerWidth;
                j[l].l = j.location.href;
                j[l].r = k.referrer;
                j[l].k = j.screen.colorDepth;
                j[l].n = k.characterSet;
                j[l].o = new Date().getTimezoneOffset();
                if (j.dataLayer)
                    for (const w of Object.entries(
                            Object.entries(dataLayer).reduce(
                                (x, y) => ({
                                    ...x[1],
                                    ...y[1]
                                }), {}
                            )
                        ))
                        zaraz.set(w[0], w[1], {
                            scope: "page"
                        });
                j[l].q = [];
                for (; j.zaraz.q.length;) {
                    const z = j.zaraz.q.shift();
                    j[l].q.push(z);
                }
                r.defer = !0;
                for (const A of [localStorage, sessionStorage])
                    Object.keys(A || {})
                    .filter((C) => C.startsWith("_zaraz_"))
                    .forEach((B) => {
                        try {
                            j[l]["z_" + B.slice(7)] = JSON.parse(A.getItem(B));
                        } catch {
                            j[l]["z_" + B.slice(7)] = A.getItem(B);
                        }
                    });
                r.referrerPolicy = "origin";
                r.src =
                    "../../../../cdn-cgi/zaraz/sd0d9.js?z=" +
                    btoa(encodeURIComponent(JSON.stringify(j[l])));
                q.parentNode.insertBefore(r, q);
            };
            ["complete", "interactive"].includes(k.readyState) ?
                zaraz.init() :
                j.addEventListener("DOMContentLoaded", zaraz.init);
        })(w, d, "zarazData", "script");
    })(window, document);
</script>


<link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&amp;display=fallback"
    />

    <link
      rel="stylesheet"
      href="../../plugins/fontawesome-free/css/all.min.css"
    />

    <link rel="stylesheet" href="../../dist/css/adminlte.min2167.css?v=3.2.0" />

    <link
      rel="stylesheet"
      href="../../plugins/summernote/summernote-bs4.min.css"
    />
    <script nonce="04dddd38-65f7-47ad-9626-d032b155c991">
      (function (w, d) {
        !(function (j, k, l, m) {
          j[l] = j[l] || {};
          j[l].executed = [];
          j.zaraz = { deferred: [], listeners: [] };
          j.zaraz.q = [];
          j.zaraz._f = function (n) {
            return async function () {
              var o = Array.prototype.slice.call(arguments);
              j.zaraz.q.push({ m: n, a: o });
            };
          };
          for (const p of ["track", "set", "debug"]) j.zaraz[p] = j.zaraz._f(p);
          j.zaraz.init = () => {
            var q = k.getElementsByTagName(m)[0],
              r = k.createElement(m),
              s = k.getElementsByTagName("title")[0];
            s && (j[l].t = k.getElementsByTagName("title")[0].text);
            j[l].x = Math.random();
            j[l].w = j.screen.width;
            j[l].h = j.screen.height;
            j[l].j = j.innerHeight;
            j[l].e = j.innerWidth;
            j[l].l = j.location.href;
            j[l].r = k.referrer;
            j[l].k = j.screen.colorDepth;
            j[l].n = k.characterSet;
            j[l].o = new Date().getTimezoneOffset();
            if (j.dataLayer)
              for (const w of Object.entries(
                Object.entries(dataLayer).reduce(
                  (x, y) => ({ ...x[1], ...y[1] }),
                  {}
                )
              ))
                zaraz.set(w[0], w[1], { scope: "page" });
            j[l].q = [];
            for (; j.zaraz.q.length; ) {
              const z = j.zaraz.q.shift();
              j[l].q.push(z);
            }
            r.defer = !0;
            for (const A of [localStorage, sessionStorage])
              Object.keys(A || {})
                .filter((C) => C.startsWith("_zaraz_"))
                .forEach((B) => {
                  try {
                    j[l]["z_" + B.slice(7)] = JSON.parse(A.getItem(B));
                  } catch {
                    j[l]["z_" + B.slice(7)] = A.getItem(B);
                  }
                });
            r.referrerPolicy = "origin";
            r.src =
              "../../../../cdn-cgi/zaraz/sd0d9.js?z=" +
              btoa(encodeURIComponent(JSON.stringify(j[l])));
            q.parentNode.insertBefore(r, q);
          };
          ["complete", "interactive"].includes(k.readyState)
            ? zaraz.init()
            : j.addEventListener("DOMContentLoaded", zaraz.init);
        })(w, d, "zarazData", "script");
      })(window, document);
    </script>


<style>
    /* FILE UPLOAD STYLES */
    .file-upload {
  background-color: #ffffff;
  width: 600px;
  margin: 0 auto;
  padding: 20px;
}

.file-upload-btn {
  width: 100%;
  margin: 0;
  color: #fff;
  background: #1FB264;
  border: none;
  padding: 10px;
  border-radius: 4px;
  border-bottom: 4px solid #15824B;
  transition: all .2s ease;
  outline: none;
  text-transform: uppercase;
  font-weight: 700;
}

.file-upload-btn:hover {
  background: #1AA059;
  color: #ffffff;
  transition: all .2s ease;
  cursor: pointer;
}

.file-upload-btn:active {
  border: 0;
  transition: all .2s ease;
}

.file-upload-content {
  display: none;
  text-align: center;
}

.file-upload-input {
  position: absolute;
  margin: 0;
  padding: 0;
  width: 100%;
  height: 100%;
  outline: none;
  opacity: 0;
  cursor: pointer;
}

.image-upload-wrap {
  margin-top: 20px;
  border: 4px dashed #1FB264;
  position: relative;
}

.image-dropping,
.image-upload-wrap:hover {
  background-color: #1FB264;
  border: 4px dashed #ffffff;
}

.image-title-wrap {
  padding: 0 15px 15px 15px;
  color: #222;
}

.drag-text {
  text-align: center;
}

.drag-text h3 {
  font-weight: 100;
  text-transform: uppercase;
  color: #15824B;
  padding: 60px 0;
}

.file-upload-image {
  max-height: 500px;
  max-width: 200px;
  margin: auto;
  padding: 20px;
}

.remove-image {
  width: 200px;
  margin: 0;
  color: #fff;
  background: #cd4535;
  border: none;
  padding: 10px;
  border-radius: 4px;
  border-bottom: 4px solid #b02818;
  transition: all .2s ease;
  outline: none;
  text-transform: uppercase;
  font-weight: 700;
}

.remove-image:hover {
  background: #c13b2a;
  color: #ffffff;
  transition: all .2s ease;
  cursor: pointer;
}

.remove-image:active {
  border: 0;
  transition: all .2s ease;
}
</style>