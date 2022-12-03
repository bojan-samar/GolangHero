<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <url>
        <loc>https://golanghero.com/</loc>
        <lastmod>2022-11-09T05:51:11+00:00</lastmod>
        <priority>1.00</priority>
    </url>

    <url>
        <loc>https://golanghero.com/job</loc>
        <lastmod>2022-11-09T05:51:11+00:00</lastmod>
        <priority>0.90</priority>
    </url>

    @foreach ($jobs as $job)
        <url>
            <loc>{{ route('job.show', $job->slug) }}</loc>
            <lastmod>{{ $job->created_at->tz('UTC')->toAtomString() }}</lastmod>
            {{--            <changefreq>weekly</changefreq>--}}
            <priority>0.8</priority>
        </url>
    @endforeach
</urlset>
