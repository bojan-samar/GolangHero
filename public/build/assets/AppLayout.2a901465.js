import{d as P,j as z,k as F,l as $,o as s,e as a,a as t,r as g,m as S,h as p,p as C,v as L,b as d,w as r,n as b,T as D,c as h,L as j,H as E,g as i,t as _,F as w,f as c,i as M,q as x,s as A}from"./app.aed78aaa.js";import{_ as H}from"./Banner.7c44b1c8.js";const I={class:"relative"},B={__name:"Dropdown",props:{align:{type:String,default:"right"},width:{type:String,default:"48"},contentClasses:{type:Array,default:()=>["py-1","bg-white"]}},setup(l){const n=l;let o=P(!1);const f=u=>{o.value&&u.key==="Escape"&&(o.value=!1)};z(()=>document.addEventListener("keydown",f)),F(()=>document.removeEventListener("keydown",f));const e=$(()=>({48:"w-48"})[n.width.toString()]),k=$(()=>n.align==="left"?"origin-top-left left-0":n.align==="right"?"origin-top-right right-0":"origin-top");return(u,v)=>(s(),a("div",I,[t("div",{onClick:v[0]||(v[0]=T=>S(o)?o.value=!p(o):o=!p(o))},[g(u.$slots,"trigger")]),C(t("div",{class:"fixed inset-0 z-40",onClick:v[1]||(v[1]=T=>S(o)?o.value=!1:o=!1)},null,512),[[L,p(o)]]),d(D,{"enter-active-class":"transition ease-out duration-200","enter-from-class":"transform opacity-0 scale-95","enter-to-class":"transform opacity-100 scale-100","leave-active-class":"transition ease-in duration-75","leave-from-class":"transform opacity-100 scale-100","leave-to-class":"transform opacity-0 scale-95"},{default:r(()=>[C(t("div",{class:b(["absolute z-50 mt-2 rounded-md shadow-lg",[p(e),p(k)]]),style:{display:"none"},onClick:v[2]||(v[2]=T=>S(o)?o.value=!1:o=!1)},[t("div",{class:b(["rounded-md ring-1 ring-black ring-opacity-5",l.contentClasses])},[g(u.$slots,"content")],2)],2),[[L,p(o)]])]),_:3})]))}},O={key:0,type:"submit",class:"block w-full px-4 py-2 text-sm leading-5 text-gray-700 text-left hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition"},V=["href"],y={__name:"DropdownLink",props:{href:String,as:String},setup(l){return(n,o)=>(s(),a("div",null,[l.as=="button"?(s(),a("button",O,[g(n.$slots,"default")])):l.as=="a"?(s(),a("a",{key:1,href:l.href,class:"block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition"},[g(n.$slots,"default")],8,V)):(s(),h(p(j),{key:2,href:l.href,class:"block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition"},{default:r(()=>[g(n.$slots,"default")]),_:3},8,["href"]))]))}},N={__name:"NavLink",props:{href:String,active:Boolean},setup(l){const n=l,o=$(()=>n.active?"inline-flex items-center px-1 pt-1 border-b-2 border-indigo-400 text-base font-medium leading-5 text-gray-900 focus:outline-none focus:border-indigo-700 transition":"inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-base font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition");return(f,e)=>(s(),h(p(j),{href:l.href,class:b(p(o))},{default:r(()=>[g(f.$slots,"default")]),_:3},8,["href","class"]))}},m={__name:"ResponsiveNavLink",props:{active:Boolean,href:String,as:String},setup(l){const n=l,o=$(()=>n.active?"block pl-3 pr-4 py-2 border-l-4 border-indigo-400 text-base font-medium text-indigo-700 bg-indigo-50 focus:outline-none focus:text-indigo-800 focus:bg-indigo-100 focus:border-indigo-700 transition":"block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-gray-300 transition");return(f,e)=>(s(),a("div",null,[l.as=="button"?(s(),a("button",{key:0,class:b([p(o),"w-full text-left"])},[g(f.$slots,"default")],2)):(s(),h(p(j),{key:1,href:l.href,class:b(p(o))},{default:r(()=>[g(f.$slots,"default")]),_:3},8,["href","class"]))]))}},J={class:"min-h-screen"},R={class:"bg-white"},q={class:"max-w-7xl mx-auto px-4 sm:px-6 lg:px-8"},U={class:"flex justify-between h-16"},G={class:"flex"},K={class:"hidden space-x-8 sm:-my-px sm:ml-10 sm:flex"},Q={class:"hidden sm:flex sm:items-center sm:ml-6"},W={key:0,class:"ml-3 relative"},X={class:"inline-flex rounded-md"},Y={type:"button",class:"inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:bg-gray-50 hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition"},Z=t("svg",{class:"ml-2 -mr-0.5 h-4 w-4",xmlns:"http://www.w3.org/2000/svg",viewBox:"0 0 20 20",fill:"currentColor"},[t("path",{"fill-rule":"evenodd",d:"M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z","clip-rule":"evenodd"})],-1),ee={class:"w-60"},te=t("div",{class:"block px-4 py-2 text-xs text-gray-400"}," Manage Team ",-1),se=t("div",{class:"border-t border-gray-100"},null,-1),re=t("div",{class:"block px-4 py-2 text-xs text-gray-400"}," Switch Teams ",-1),oe=["onSubmit"],ae={class:"flex items-center"},ne={key:0,class:"mr-2 h-5 w-5 text-green-400",fill:"none","stroke-linecap":"round","stroke-linejoin":"round","stroke-width":"2",stroke:"currentColor",viewBox:"0 0 24 24"},ie=t("path",{d:"M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"},null,-1),le=[ie],de={key:1,class:"ml-3 relative"},ue={key:0,class:"flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition"},ce=["src","alt"],pe={key:1,class:"inline-flex rounded-md"},fe={type:"button",class:"inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition"},he=t("svg",{class:"ml-2 -mr-0.5 h-4 w-4",xmlns:"http://www.w3.org/2000/svg",viewBox:"0 0 20 20",fill:"currentColor"},[t("path",{"fill-rule":"evenodd",d:"M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z","clip-rule":"evenodd"})],-1),me=t("div",{class:"block px-4 py-2 text-xs text-gray-400"}," Manage Account ",-1),ge=t("div",{class:"border-t border-gray-100"},null,-1),ve=["onSubmit"],be={class:"-mr-2 flex items-center sm:hidden"},ye={class:"h-6 w-6",stroke:"currentColor",fill:"none",viewBox:"0 0 24 24"},_e={class:"pt-2 pb-3 space-y-1"},ke={key:0,class:"pt-4 pb-1 border-t border-gray-200"},we={class:"flex items-center px-4"},xe={key:0,class:"shrink-0 mr-3"},$e=["src","alt"],Se={class:"font-medium text-base text-gray-800"},je={class:"font-medium text-sm text-gray-500"},Te={class:"mt-3 space-y-1"},Ce=["onSubmit"],Le=t("div",{class:"border-t border-gray-200"},null,-1),Me=t("div",{class:"block px-4 py-2 text-xs text-gray-400"}," Manage Team ",-1),Ae=t("div",{class:"border-t border-gray-200"},null,-1),Be=t("div",{class:"block px-4 py-2 text-xs text-gray-400"}," Switch Teams ",-1),Ne=["onSubmit"],Pe={class:"flex items-center"},ze={key:0,class:"mr-2 h-5 w-5 text-green-400",fill:"none","stroke-linecap":"round","stroke-linejoin":"round","stroke-width":"2",stroke:"currentColor",viewBox:"0 0 24 24"},Fe=t("path",{d:"M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"},null,-1),De=[Fe],Ie={__name:"AppLayout",props:{title:String},setup(l){z(()=>{});const n=P(!1),o=e=>{A.Inertia.put(route("current-team.update"),{team_id:e.id},{preserveState:!1})},f=()=>{A.Inertia.post(route("logout"))};return(e,k)=>(s(),a("div",null,[d(p(E),{title:l.title},null,8,["title"]),d(H),t("div",J,[t("nav",R,[t("div",q,[t("div",U,[t("div",G,[t("div",K,[d(N,{href:e.route("welcome"),active:e.route().current("welcome")},{default:r(()=>[i(" Home ")]),_:1},8,["href","active"]),d(N,{href:e.route("job.index"),active:e.route().current("job.index")},{default:r(()=>[i(" Jobs ")]),_:1},8,["href","active"])])]),t("div",Q,[e.$page.props.user?(s(),a("div",W,[e.$page.props.jetstream.hasTeamFeatures?(s(),h(B,{key:0,align:"right",width:"60"},{trigger:r(()=>[t("span",X,[t("button",Y,[i(_(e.$page.props.user.current_team.name)+" ",1),Z])])]),content:r(()=>[t("div",ee,[e.$page.props.jetstream.hasTeamFeatures?(s(),a(w,{key:0},[te,d(y,{href:e.route("teams.show",e.$page.props.user.current_team)},{default:r(()=>[i(" Team Settings ")]),_:1},8,["href"]),e.$page.props.jetstream.canCreateTeams?(s(),h(y,{key:0,href:e.route("teams.create")},{default:r(()=>[i(" Create New Team ")]),_:1},8,["href"])):c("",!0),se,re,(s(!0),a(w,null,M(e.$page.props.user.all_teams,u=>(s(),a("form",{key:u.id,onSubmit:x(v=>o(u),["prevent"])},[d(y,{as:"button"},{default:r(()=>[t("div",ae,[u.id==e.$page.props.user.current_team_id?(s(),a("svg",ne,le)):c("",!0),t("div",null,_(u.name),1)])]),_:2},1024)],40,oe))),128))],64)):c("",!0)])]),_:1})):c("",!0)])):c("",!0),e.$page.props.user?(s(),a("div",de,[d(B,{align:"right",width:"48"},{trigger:r(()=>[e.$page.props.jetstream.managesProfilePhotos?(s(),a("button",ue,[t("img",{class:"h-8 w-8 rounded-full object-cover",src:e.$page.props.user.profile_photo_url,alt:e.$page.props.user.name},null,8,ce)])):(s(),a("span",pe,[t("button",fe,[i(_(e.$page.props.user.name)+" ",1),he])]))]),content:r(()=>[me,d(y,{href:e.route("profile.show")},{default:r(()=>[i(" Profile ")]),_:1},8,["href"]),e.$page.props.user.isAdmin?(s(),h(y,{key:0,href:e.route("admin.blog.index")},{default:r(()=>[i(" Admin ")]),_:1},8,["href"])):c("",!0),e.$page.props.jetstream.hasApiFeatures?(s(),h(y,{key:1,href:e.route("api-tokens.index")},{default:r(()=>[i(" API Tokens ")]),_:1},8,["href"])):c("",!0),ge,t("form",{onSubmit:x(f,["prevent"])},[d(y,{as:"button"},{default:r(()=>[i(" Log Out ")]),_:1})],40,ve)]),_:1})])):c("",!0)]),t("div",be,[t("button",{class:"inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition",onClick:k[0]||(k[0]=u=>n.value=!n.value)},[(s(),a("svg",ye,[t("path",{class:b({hidden:n.value,"inline-flex":!n.value}),"stroke-linecap":"round","stroke-linejoin":"round","stroke-width":"2",d:"M4 6h16M4 12h16M4 18h16"},null,2),t("path",{class:b({hidden:!n.value,"inline-flex":n.value}),"stroke-linecap":"round","stroke-linejoin":"round","stroke-width":"2",d:"M6 18L18 6M6 6l12 12"},null,2)]))])])])]),t("div",{class:b([{block:n.value,hidden:!n.value},"sm:hidden"])},[t("div",_e,[d(m,{href:e.route("welcome"),active:e.route().current("welcome")},{default:r(()=>[i(" Home ")]),_:1},8,["href","active"]),d(m,{href:e.route("job.index"),active:e.route().current("job.index")},{default:r(()=>[i(" Jobs ")]),_:1},8,["href","active"])]),e.$page.props.user?(s(),a("div",ke,[t("div",we,[e.$page.props.jetstream.managesProfilePhotos?(s(),a("div",xe,[t("img",{class:"h-10 w-10 rounded-full object-cover",src:e.$page.props.user.profile_photo_url,alt:e.$page.props.user.name},null,8,$e)])):c("",!0),t("div",null,[t("div",Se,_(e.$page.props.user.name),1),t("div",je,_(e.$page.props.user.email),1)])]),t("div",Te,[d(m,{href:e.route("profile.show"),active:e.route().current("profile.show")},{default:r(()=>[i(" Profile ")]),_:1},8,["href","active"]),e.$page.props.user.isAdmin?(s(),h(m,{key:0,href:e.route("admin.blog.index"),active:e.route().current("admin.blog.index")},{default:r(()=>[i(" Admin ")]),_:1},8,["href","active"])):c("",!0),e.$page.props.jetstream.hasApiFeatures?(s(),h(m,{key:1,href:e.route("api-tokens.index"),active:e.route().current("api-tokens.index")},{default:r(()=>[i(" API Tokens ")]),_:1},8,["href","active"])):c("",!0),t("form",{method:"POST",onSubmit:x(f,["prevent"])},[d(m,{as:"button"},{default:r(()=>[i(" Log Out ")]),_:1})],40,Ce),e.$page.props.jetstream.hasTeamFeatures?(s(),a(w,{key:2},[Le,Me,d(m,{href:e.route("teams.show",e.$page.props.user.current_team),active:e.route().current("teams.show")},{default:r(()=>[i(" Team Settings ")]),_:1},8,["href","active"]),e.$page.props.jetstream.canCreateTeams?(s(),h(m,{key:0,href:e.route("teams.create"),active:e.route().current("teams.create")},{default:r(()=>[i(" Create New Team ")]),_:1},8,["href","active"])):c("",!0),Ae,Be,(s(!0),a(w,null,M(e.$page.props.user.all_teams,u=>(s(),a("form",{key:u.id,onSubmit:x(v=>o(u),["prevent"])},[d(m,{as:"button"},{default:r(()=>[t("div",Pe,[u.id==e.$page.props.user.current_team_id?(s(),a("svg",ze,De)):c("",!0),t("div",null,_(u.name),1)])]),_:2},1024)],40,Ne))),128))],64)):c("",!0)])])):c("",!0)],2)]),t("main",null,[g(e.$slots,"default")])])]))}};export{Ie as _};
