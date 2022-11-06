@if(\App\Helpers\Helpers::canShowTrackingScripts())

    @if (env('MS_CLARITY'))
        <script type="text/javascript">
            (function(c,l,a,r,i,t,y){
                c[a]=c[a]||function(){(c[a].q=c[a].q||[]).push(arguments)};
                t=l.createElement(r);t.async=1;t.src="https://www.clarity.ms/tag/"+i;
                y=l.getElementsByTagName(r)[0];y.parentNode.insertBefore(t,y);
            })(window, document, "clarity", "script", "{{ env('MS_CLARITY') }}");
        </script>
    @endif


    @if (env('GOOGLE_ANALYTICS'))
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id={{ env('GOOGLE_ANALYTICS') }}"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());
            gtag('config', "{{ env('GOOGLE_ANALYTICS') }}");
        </script>
    @endif


    @if (env('GOOGLE_ADS'))
        <!-- Global site tag (gtag.js) - Google Ads: 411166413 -->
        <script async src="https://www.googletagmanager.com/gtag/js?id={{ env('GOOGLE_ADS') }}"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', '{{ env('GOOGLE_ADS') }}');
        </script>
    @endif


    @if (env('FACEBOOK_ADS'))
        <!-- Facebook Pixel Code -->
        <script>
            !function (f, b, e, v, n, t, s) {
                if (f.fbq) return;
                n = f.fbq = function () {
                    n.callMethod ?
                        n.callMethod.apply(n, arguments) : n.queue.push(arguments)
                };
                if (!f._fbq) f._fbq = n;
                n.push = n;
                n.loaded = !0;
                n.version = '2.0';
                n.queue = [];
                t = b.createElement(e);
                t.async = !0;
                t.src = v;
                s = b.getElementsByTagName(e)[0];
                s.parentNode.insertBefore(t, s)
            }(window, document, 'script',
                'https://connect.facebook.net/en_US/fbevents.js');
            fbq('init', "{{ env('FACEBOOK_ADS') }}");
        </script>
        <noscript><img height="1" width="1" style="display:none"
                       src="https://www.facebook.com/tr?id={{ env('FACEBOOK_ADS') }}&ev=PageView&noscript=1"
            /></noscript>
        <!-- End Facebook Pixel Code -->
    @endif

@endif
