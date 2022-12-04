import{o as a,e as n,a as e,f as l,b as r,w as i,t,h as m,L as d,g as s}from"./app.f850b400.js";const h={class:"bg-white card mb-8 flex flex-wrap job-post"},w={key:0,class:"w-full md:w-1/6 company-logo p-4"},u=["src","alt"],f={class:"w-full flex-1 job-details"},b={class:"font-medium text-lg"},j={class:"flex flex-wrap text-sm"},v={class:"company-name w-1/2 md:w-auto pr-6 flex items-center mt-2"},x=e("svg",{xmlns:"http://www.w3.org/2000/svg",class:"h-5 w-5 mr-1 inline",fill:"none",viewBox:"0 0 24 24",stroke:"currentColor"},[e("path",{"stroke-linecap":"round","stroke-linejoin":"round","stroke-width":"1.5",d:"M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"})],-1),k={class:"created_at w-1/2 md:w-auto pr-6 flex items-center mt-2"},g=e("svg",{xmlns:"http://www.w3.org/2000/svg",class:"h-5 w-5 mr-1 inline",fill:"none",viewBox:"0 0 24 24",stroke:"currentColor","stroke-width":"1.5"},[e("path",{"stroke-linecap":"round","stroke-linejoin":"round",d:"M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"}),e("path",{"stroke-linecap":"round","stroke-linejoin":"round",d:"M15 11a3 3 0 11-6 0 3 3 0 016 0z"})],-1),p={class:"created_at w-1/2 md:w-auto pr-6 flex items-center mt-2"},_=e("svg",{xmlns:"http://www.w3.org/2000/svg",class:"h-5 w-5 inline mr-2",fill:"none",viewBox:"0 0 24 24",stroke:"currentColor"},[e("path",{"stroke-linecap":"round","stroke-linejoin":"round","stroke-width":"1.5",d:"M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"})],-1),B={__name:"JobCard",props:{job:Object},setup(o){return(c,y)=>(a(),n("div",h,[o.job.company&&o.job.company.photo?(a(),n("section",w,[e("img",{class:"rounded-full h-16 w-16 object-cover",src:o.job.company.photoUrl,alt:o.job.company.name},null,8,u)])):l("",!0),e("section",f,[r(m(d),{href:c.route("job.show",o.job.slug)},{default:i(()=>[e("h2",b,t(o.job.title),1)]),_:1},8,["href"]),e("div",j,[e("div",v,[x,s(" "+t(o.job.company?o.job.company.name:o.job.company),1)]),e("div",k,[g,s(" "+t(o.job.location),1)]),e("div",p,[_,s(" "+t(o.job.created_at_human),1)])])])]))}};export{B as _};