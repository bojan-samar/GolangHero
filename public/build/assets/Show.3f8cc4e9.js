import{o as n,c as m,w as s,a as t,b as r,g as i,h as u,L as c,t as a,e as f,f as h}from"./app.2841f7de.js";import{_ as k}from"./AdminLayout.dba62df1.js";import{_ as o}from"./SecondaryButton.cc79638d.js";import"./Banner.31b6544d.js";const x={class:"max-w-2xl mx-auto flex justify-between"},g={class:"max-w-2xl mx-auto card bg-white mt-5"},v={class:"mb-4"},w=["src","alt"],b={key:0,id:"tracking",class:"mt-4"},_=t("h2",{class:"uppercase text-sm font-bold"},"Tracking",-1),E={__name:"Show",props:{user:Object},setup(e){const d=e;return(l,B)=>(n(),m(k,{title:e.user.name},{default:s(()=>[t("section",x,[r(u(c),{href:l.route("admin.user.index")},{default:s(()=>[r(o,null,{default:s(()=>[i("Back")]),_:1})]),_:1},8,["href"]),r(u(c),{href:l.route("admin.user.edit",d.user.username)},{default:s(()=>[r(o,null,{default:s(()=>[i("Edit")]),_:1})]),_:1},8,["href"])]),t("section",g,[t("div",v,[t("img",{src:e.user.profile_photo_url,alt:e.user.name,class:"rounded-full h-20 w-20 object-cover"},null,8,w)]),t("div",null,"Name: "+a(e.user.name),1),t("div",null,"Username: "+a(e.user.username),1),t("div",null,"Email: "+a(e.user.email),1),t("div",null,"Role: "+a(e.user.role),1),e.user.tracking?(n(),f("div",b,[_,t("div",null,"UTM = "+a(e.user.tracking.utm),1),t("div",null,"Referral = "+a(e.user.tracking.referral),1),t("div",null,"Referer = "+a(e.user.tracking.referer),1)])):h("",!0)])]),_:1},8,["title"]))}};export{E as default};
