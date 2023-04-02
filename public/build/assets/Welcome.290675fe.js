import{_ as h}from"./AppLayout.45829db0.js";import{o as s,c as d,w as e,b as o,h as n,H as b,U as g,g as l,a as t,L as c,t as m,e as r,i as y,F as _,f}from"./app.3247dd9a.js";import{_ as C,a as w}from"./JobAlertSignUp.865e5ebc.js";import{_ as x}from"./PrimaryButton.c2c54cde.js";import{_ as v}from"./SecondaryButton.319dd5ce.js";import"./Banner.fd5761c9.js";import"./tiptap-vue-3.esm.87a1a393.js";import"./tiptap-starter-kit.esm.27a94095.js";import"./TextInput.76c9102b.js";import"./InputError.cda445be.js";import"./InputLabel.07deb51a.js";import"./ActionMessage.a4e57d7a.js";const k=t("title",null,"Biggest Golang Job Board - Find Your Perfect Job",-1),j=t("meta",{name:"description",content:"Browse through thousands of Golang jobs. Apply today and start your perfect career"},null,-1),B={class:"text-center px-4"},J=t("h1",{class:"max-w-3xl mx-auto text-5xl font-bla5 md:text-5xl lg:text-6xl mt-12 mb-3"},"Biggest Golang Job Board",-1),L=t("p",null," Special Offer: For a limited time, you can post a Golang job for only $9.99 ",-1),N={class:"mt-5 flex space-x-4 justify-center"},$={href:"#jobs"},G=t("span",{class:"px-3 py-2 text-sm"},"See Jobs",-1),M=t("span",{class:"px-3 py-2 text-sm"},"Post Job",-1),P={id:"stats",class:"max-w-2xl mx-auto grid md:grid-cols-2 gap-10 py-12 px-4"},F={class:"text-center rounded-3xl px-6 py-12 shadow-xl"},H={class:"text-5xl font-black mt-1 tracking-wider"},V=t("h3",{class:"mt-1"},"Companies Hiring",-1),S={class:"text-center rounded-3xl px-6 py-12 shadow-xl"},T={class:"text-5xl font-black mt-1 tracking-wider"},Z=t("h3",{class:"mt-1"},"Active Jobs",-1),z=t("section",{class:"wave"},[t("svg",{viewBox:"0 0 1428 174",version:"1.1",xmlns:"http://www.w3.org/2000/svg","xmlns:xlink":"http://www.w3.org/1999/xlink"},[t("g",{stroke:"none","stroke-width":"1",fill:"none","fill-rule":"evenodd"},[t("g",{transform:"translate(-2.000000, 44.000000)",fill:"#f3f4f6","fill-rule":"nonzero"},[t("path",{d:"M0,0 C90.7283404,0.927527913 147.912752,27.187927 291.910178,59.9119003 C387.908462,81.7278826 543.605069,89.334785 759,82.7326078 C469.336065,156.254352 216.336065,153.6679 0,74.9732496",opacity:"0.400000001"}),t("path",{d:"M100,104.708498 C277.413333,72.2345949 426.147877,52.5246657 546.203633,45.5787101 C666.259389,38.6327546 810.524845,41.7979068 979,55.0741668 C931.069965,56.122511 810.303266,74.8455141 616.699903,111.243176 C423.096539,147.640838 250.863238,145.462612 100,104.708498 Z",opacity:"0.400000001"}),t("path",{d:"M1046,51.6521276 C1130.83045,29.328812 1279.08318,17.607883 1439,40.1656806 L1439,120 C1271.17211,77.9435312 1140.17211,55.1609071 1046,51.6521276 Z",id:"Path-4",opacity:"0.400000003"})]),t("g",{transform:"translate(-4.000000, 76.000000)",fill:"#f3f4f6","fill-rule":"nonzero"},[t("path",{d:"M0.457,34.035 C57.086,53.198 98.208,65.809 123.822,71.865 C181.454,85.495 234.295,90.29 272.033,93.459 C311.355,96.759 396.635,95.801 461.025,91.663 C486.76,90.01 518.727,86.372 556.926,80.752 C595.747,74.596 622.372,70.008 636.799,66.991 C663.913,61.324 712.501,49.503 727.605,46.128 C780.47,34.317 818.839,22.532 856.324,15.904 C922.689,4.169 955.676,2.522 1011.185,0.432 C1060.705,1.477 1097.39,3.129 1121.236,5.387 C1161.703,9.219 1208.621,17.821 1235.4,22.304 C1285.855,30.748 1354.351,47.432 1440.886,72.354 L1441.191,104.352 L1.121,104.031 L0.457,34.035 Z"})])])])],-1),A={class:"bg-gray-100 px-4 py-12",id:"jobs"},D={class:"max-w-3xl mx-auto"},O=t("h2",{class:"mb-5 font-bold tracking-wider text-3xl text-center"},"Recent Jobs",-1),E={class:"max-w-3xl mx-auto px-4 my-12"},R={key:0,class:"card bg-yellow-200 max-w-4xl mx-auto mb-8 text-center"},U={class:"mt-4"},W={key:0,class:"text-center"},rt={__name:"Welcome",props:{jobs:Object,jobsTotalCount:Number,companyCount:Number},setup(a){return(i,Y)=>(s(),d(h,null,{default:e(()=>[o(n(b),null,{default:e(()=>[k,j]),_:1}),(s(),d(g("style"),null,{default:e(()=>[l(" body{ background: #ffffff!important; } ")]),_:1})),t("section",B,[J,L,t("div",N,[t("a",$,[o(v,null,{default:e(()=>[G]),_:1})]),o(n(c),{href:i.route("job-create")},{default:e(()=>[o(x,null,{default:e(()=>[M]),_:1})]),_:1},8,["href"])])]),t("section",P,[t("div",F,[t("div",H,m(a.companyCount)+"+",1),V]),t("div",S,[t("div",T,m(a.jobsTotalCount)+"+",1),Z])]),z,t("section",A,[t("div",D,[O,t("section",E,[o(C)]),(s(!0),r(_,null,y(a.jobs.data,(u,p)=>(s(),r(_,null,[o(w,{job:u},null,8,["job"]),p%10==0?(s(),r("section",R,[l(" \u{1F525} Create Profile, Get Hired (Beta) "),t("div",U,[o(n(c),{href:i.route("account.worker.index")},{default:e(()=>[o(x,null,{default:e(()=>[l("Create Profile")]),_:1})]),_:1},8,["href"])])])):f("",!0)],64))),256))]),a.jobs.links.next?(s(),r("div",W,[o(n(c),{class:"relative inline-flex items-center px-4 py-2 rounded-full text-sm font-medium text-gray-700 bg-white border border-gray-300 hover:text-gray-500 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150",href:i.route("job.index",{page:2})},{default:e(()=>[l("More \xBB ")]),_:1},8,["href"])])):f("",!0)])]),_:1}))}};export{rt as default};
