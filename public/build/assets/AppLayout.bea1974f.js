import{d as N,j as z,k as F,l as j,o as s,e as n,a as t,r as m,m as C,h as p,p as A,v as L,b as i,w as r,n as y,T as D,c as h,L as S,q as E,H,g as a,t as _,F as w,f as c,i as M,s as x,x as P}from"./app.040b40aa.js";import{_ as I}from"./Banner.870edfe2.js";const J={class:"relative"},B={__name:"Dropdown",props:{align:{type:String,default:"right"},width:{type:String,default:"48"},contentClasses:{type:Array,default:()=>["py-1","bg-white"]}},setup(d){const l=d;let o=N(!1);const g=u=>{o.value&&u.key==="Escape"&&(o.value=!1)};z(()=>document.addEventListener("keydown",g)),F(()=>document.removeEventListener("keydown",g));const e=j(()=>({48:"w-48"})[l.width.toString()]),k=j(()=>l.align==="left"?"origin-top-left left-0":l.align==="right"?"origin-top-right right-0":"origin-top");return(u,v)=>(s(),n("div",J,[t("div",{onClick:v[0]||(v[0]=T=>C(o)?o.value=!p(o):o=!p(o))},[m(u.$slots,"trigger")]),A(t("div",{class:"fixed inset-0 z-40",onClick:v[1]||(v[1]=T=>C(o)?o.value=!1:o=!1)},null,512),[[L,p(o)]]),i(D,{"enter-active-class":"transition ease-out duration-200","enter-from-class":"transform opacity-0 scale-95","enter-to-class":"transform opacity-100 scale-100","leave-active-class":"transition ease-in duration-75","leave-from-class":"transform opacity-100 scale-100","leave-to-class":"transform opacity-0 scale-95"},{default:r(()=>[A(t("div",{class:y(["absolute z-50 mt-2 rounded-md shadow-lg",[p(e),p(k)]]),style:{display:"none"},onClick:v[2]||(v[2]=T=>C(o)?o.value=!1:o=!1)},[t("div",{class:y(["rounded-md ring-1 ring-black ring-opacity-5",d.contentClasses])},[m(u.$slots,"content")],2)],2),[[L,p(o)]])]),_:3})]))}},O={key:0,type:"submit",class:"block w-full px-4 py-2 text-sm leading-5 text-gray-700 text-left hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition"},V=["href"],b={__name:"DropdownLink",props:{href:String,as:String},setup(d){return(l,o)=>(s(),n("div",null,[d.as=="button"?(s(),n("button",O,[m(l.$slots,"default")])):d.as=="a"?(s(),n("a",{key:1,href:d.href,class:"block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition"},[m(l.$slots,"default")],8,V)):(s(),h(p(S),{key:2,href:d.href,class:"block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition"},{default:r(()=>[m(l.$slots,"default")]),_:3},8,["href"]))]))}},$={__name:"NavLink",props:{href:String,active:Boolean},setup(d){const l=d,o=j(()=>l.active?"inline-flex items-center px-1 pt-1 border-b-2 border-indigo-400 text-base font-medium leading-5 text-gray-900 focus:outline-none focus:border-indigo-700 transition":"inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-base font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition");return(g,e)=>(s(),h(p(S),{href:d.href,class:y(p(o))},{default:r(()=>[m(g.$slots,"default")]),_:3},8,["href","class"]))}},f={__name:"ResponsiveNavLink",props:{active:Boolean,href:String,as:String},setup(d){const l=d,o=j(()=>l.active?"block pl-3 pr-4 py-2 border-l-4 border-indigo-400 text-base font-medium text-indigo-700 bg-indigo-50 focus:outline-none focus:text-indigo-800 focus:bg-indigo-100 focus:border-indigo-700 transition":"block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-gray-300 transition");return(g,e)=>(s(),n("div",null,[d.as=="button"?(s(),n("button",{key:0,class:y([p(o),"w-full text-left"])},[m(g.$slots,"default")],2)):(s(),h(p(S),{key:1,href:d.href,class:y(p(o))},{default:r(()=>[m(g.$slots,"default")]),_:3},8,["href","class"]))]))}},R={class:"bg-yellow-200 text-center py-4 md:py-2"},q={class:"min-h-screen"},G={class:"bg-white"},U={class:"max-w-7xl mx-auto px-4 sm:px-6 lg:px-8"},K={class:"flex justify-between h-16"},Q={class:"flex"},W={class:"hidden space-x-8 sm:-my-px sm:ml-10 sm:flex"},X={class:"hidden sm:flex sm:items-center sm:ml-6"},Y={key:0,class:"ml-3 relative"},Z={class:"inline-flex rounded-md"},ee={type:"button",class:"inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:bg-gray-50 hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition"},te=t("svg",{class:"ml-2 -mr-0.5 h-4 w-4",xmlns:"http://www.w3.org/2000/svg",viewBox:"0 0 20 20",fill:"currentColor"},[t("path",{"fill-rule":"evenodd",d:"M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z","clip-rule":"evenodd"})],-1),se={class:"w-60"},re=t("div",{class:"block px-4 py-2 text-xs text-gray-400"}," Manage Team ",-1),oe=t("div",{class:"border-t border-gray-100"},null,-1),ae=t("div",{class:"block px-4 py-2 text-xs text-gray-400"}," Switch Teams ",-1),ne=["onSubmit"],ie={class:"flex items-center"},le={key:0,class:"mr-2 h-5 w-5 text-green-400",fill:"none","stroke-linecap":"round","stroke-linejoin":"round","stroke-width":"2",stroke:"currentColor",viewBox:"0 0 24 24"},de=t("path",{d:"M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"},null,-1),ue=[de],ce={key:1,class:"ml-3 relative"},pe={key:0,class:"flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition"},fe=["src","alt"],ge={key:1,class:"inline-flex rounded-md"},he={type:"button",class:"inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition"},me=t("svg",{class:"ml-2 -mr-0.5 h-4 w-4",xmlns:"http://www.w3.org/2000/svg",viewBox:"0 0 20 20",fill:"currentColor"},[t("path",{"fill-rule":"evenodd",d:"M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z","clip-rule":"evenodd"})],-1),ve=t("div",{class:"block px-4 py-2 text-xs text-gray-400"}," Manage Account ",-1),ye=t("div",{class:"border-t border-gray-100"},null,-1),be=["onSubmit"],_e={class:"-mr-2 flex items-center sm:hidden"},ke={class:"h-6 w-6",stroke:"currentColor",fill:"none",viewBox:"0 0 24 24"},we={class:"pt-2 pb-3 space-y-1"},xe={key:0,class:"pt-4 pb-1 border-t border-gray-200"},$e={class:"flex items-center px-4"},je={key:0,class:"shrink-0 mr-3"},Se=["src","alt"],Ce={class:"font-medium text-base text-gray-800"},Te={class:"font-medium text-sm text-gray-500"},Ae={class:"mt-3 space-y-1"},Le=["onSubmit"],Me=t("div",{class:"border-t border-gray-200"},null,-1),Pe=t("div",{class:"block px-4 py-2 text-xs text-gray-400"}," Manage Team ",-1),Be=t("div",{class:"border-t border-gray-200"},null,-1),Ne=t("div",{class:"block px-4 py-2 text-xs text-gray-400"}," Switch Teams ",-1),ze=["onSubmit"],Fe={class:"flex items-center"},De={key:0,class:"mr-2 h-5 w-5 text-green-400",fill:"none","stroke-linecap":"round","stroke-linejoin":"round","stroke-width":"2",stroke:"currentColor",viewBox:"0 0 24 24"},Ee=t("path",{d:"M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"},null,-1),He=[Ee],Oe={__name:"AppLayout",props:{title:String},setup(d){z(()=>{let e=E().props.value.tracking.googleAnalytics;e&&(console.log("Firing Analytics Tag"),gtag("js",new Date),gtag("config",`${e}`))});const l=N(!1),o=e=>{P.Inertia.put(route("current-team.update"),{team_id:e.id},{preserveState:!1})},g=()=>{P.Inertia.post(route("logout"))};return(e,k)=>(s(),n("div",null,[i(p(H),{title:d.title},null,8,["title"]),i(I),t("div",R,[i(p(S),{href:e.route("account.worker.index")},{default:r(()=>[a(" \u{1F525} Create Profile, Get Hired (Beta) ")]),_:1},8,["href"])]),t("div",q,[t("nav",G,[t("div",U,[t("div",K,[t("div",Q,[t("div",W,[i($,{href:e.route("welcome"),active:e.route().current("welcome")},{default:r(()=>[a(" Home ")]),_:1},8,["href","active"]),i($,{href:e.route("job.index"),active:e.route().current("job.index")},{default:r(()=>[a(" Jobs ")]),_:1},8,["href","active"]),i($,{href:e.route("company.index"),active:e.route().current("company.index")},{default:r(()=>[a(" Companies ")]),_:1},8,["href","active"]),i($,{href:e.route("job-create"),active:e.route().current("job-create")},{default:r(()=>[a(" Post Job ")]),_:1},8,["href","active"])])]),t("div",X,[e.$page.props.user?(s(),n("div",Y,[e.$page.props.jetstream.hasTeamFeatures?(s(),h(B,{key:0,align:"right",width:"60"},{trigger:r(()=>[t("span",Z,[t("button",ee,[a(_(e.$page.props.user.current_team.name)+" ",1),te])])]),content:r(()=>[t("div",se,[e.$page.props.jetstream.hasTeamFeatures?(s(),n(w,{key:0},[re,i(b,{href:e.route("teams.show",e.$page.props.user.current_team)},{default:r(()=>[a(" Team Settings ")]),_:1},8,["href"]),e.$page.props.jetstream.canCreateTeams?(s(),h(b,{key:0,href:e.route("teams.create")},{default:r(()=>[a(" Create New Team ")]),_:1},8,["href"])):c("",!0),oe,ae,(s(!0),n(w,null,M(e.$page.props.user.all_teams,u=>(s(),n("form",{key:u.id,onSubmit:x(v=>o(u),["prevent"])},[i(b,{as:"button"},{default:r(()=>[t("div",ie,[u.id==e.$page.props.user.current_team_id?(s(),n("svg",le,ue)):c("",!0),t("div",null,_(u.name),1)])]),_:2},1024)],40,ne))),128))],64)):c("",!0)])]),_:1})):c("",!0)])):c("",!0),e.$page.props.user?(s(),n("div",ce,[i(B,{align:"right",width:"48"},{trigger:r(()=>[e.$page.props.jetstream.managesProfilePhotos?(s(),n("button",pe,[t("img",{class:"h-8 w-8 rounded-full object-cover",src:e.$page.props.user.profile_photo_url,alt:e.$page.props.user.name},null,8,fe)])):(s(),n("span",ge,[t("button",he,[a(_(e.$page.props.user.name)+" ",1),me])]))]),content:r(()=>[ve,i(b,{href:e.route("profile.show")},{default:r(()=>[a(" Profile ")]),_:1},8,["href"]),e.$page.props.user.isAdmin?(s(),h(b,{key:0,href:e.route("admin.blog.index")},{default:r(()=>[a(" Admin ")]),_:1},8,["href"])):c("",!0),e.$page.props.jetstream.hasApiFeatures?(s(),h(b,{key:1,href:e.route("api-tokens.index")},{default:r(()=>[a(" API Tokens ")]),_:1},8,["href"])):c("",!0),ye,t("form",{onSubmit:x(g,["prevent"])},[i(b,{as:"button"},{default:r(()=>[a(" Log Out ")]),_:1})],40,be)]),_:1})])):c("",!0)]),t("div",_e,[t("button",{class:"inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition",onClick:k[0]||(k[0]=u=>l.value=!l.value)},[(s(),n("svg",ke,[t("path",{class:y({hidden:l.value,"inline-flex":!l.value}),"stroke-linecap":"round","stroke-linejoin":"round","stroke-width":"2",d:"M4 6h16M4 12h16M4 18h16"},null,2),t("path",{class:y({hidden:!l.value,"inline-flex":l.value}),"stroke-linecap":"round","stroke-linejoin":"round","stroke-width":"2",d:"M6 18L18 6M6 6l12 12"},null,2)]))])])])]),t("div",{class:y([{block:l.value,hidden:!l.value},"sm:hidden"])},[t("div",we,[i(f,{href:e.route("welcome"),active:e.route().current("welcome")},{default:r(()=>[a(" Home ")]),_:1},8,["href","active"]),i(f,{href:e.route("job.index"),active:e.route().current("job.index")},{default:r(()=>[a(" Jobs ")]),_:1},8,["href","active"]),i(f,{href:e.route("company.index"),active:e.route().current("company.index")},{default:r(()=>[a(" Companies ")]),_:1},8,["href","active"]),i(f,{href:e.route("job-create"),active:e.route().current("job-create")},{default:r(()=>[a(" Post Job ")]),_:1},8,["href","active"])]),e.$page.props.user?(s(),n("div",xe,[t("div",$e,[e.$page.props.jetstream.managesProfilePhotos?(s(),n("div",je,[t("img",{class:"h-10 w-10 rounded-full object-cover",src:e.$page.props.user.profile_photo_url,alt:e.$page.props.user.name},null,8,Se)])):c("",!0),t("div",null,[t("div",Ce,_(e.$page.props.user.name),1),t("div",Te,_(e.$page.props.user.email),1)])]),t("div",Ae,[i(f,{href:e.route("profile.show"),active:e.route().current("profile.show")},{default:r(()=>[a(" Profile ")]),_:1},8,["href","active"]),e.$page.props.user.isAdmin?(s(),h(f,{key:0,href:e.route("admin.blog.index"),active:e.route().current("admin.blog.index")},{default:r(()=>[a(" Admin ")]),_:1},8,["href","active"])):c("",!0),e.$page.props.jetstream.hasApiFeatures?(s(),h(f,{key:1,href:e.route("api-tokens.index"),active:e.route().current("api-tokens.index")},{default:r(()=>[a(" API Tokens ")]),_:1},8,["href","active"])):c("",!0),t("form",{method:"POST",onSubmit:x(g,["prevent"])},[i(f,{as:"button"},{default:r(()=>[a(" Log Out ")]),_:1})],40,Le),e.$page.props.jetstream.hasTeamFeatures?(s(),n(w,{key:2},[Me,Pe,i(f,{href:e.route("teams.show",e.$page.props.user.current_team),active:e.route().current("teams.show")},{default:r(()=>[a(" Team Settings ")]),_:1},8,["href","active"]),e.$page.props.jetstream.canCreateTeams?(s(),h(f,{key:0,href:e.route("teams.create"),active:e.route().current("teams.create")},{default:r(()=>[a(" Create New Team ")]),_:1},8,["href","active"])):c("",!0),Be,Ne,(s(!0),n(w,null,M(e.$page.props.user.all_teams,u=>(s(),n("form",{key:u.id,onSubmit:x(v=>o(u),["prevent"])},[i(f,{as:"button"},{default:r(()=>[t("div",Fe,[u.id==e.$page.props.user.current_team_id?(s(),n("svg",De,He)):c("",!0),t("div",null,_(u.name),1)])]),_:2},1024)],40,ze))),128))],64)):c("",!0)])])):c("",!0)],2)]),t("main",null,[m(e.$slots,"default")])])]))}};export{Oe as _};