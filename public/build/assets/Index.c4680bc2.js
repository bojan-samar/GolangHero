import{_ as o}from"./AppLayout.bea1974f.js";import r from"./UpdateEmployment.644c4bc3.js";import i from"./UpdateSkills.d732d10d.js";import c from"./UpdateSocials.6b41e09e.js";import m from"./UpdateUsername.62e0b7fc.js";import a from"./UpdateResume.e417f1f3.js";import{o as l,c as n,w as _,a as e,b as s}from"./app.040b40aa.js";import"./Banner.870edfe2.js";import"./PrimaryButton.a232c3f6.js";import"./OutlineButton.5904a46f.js";import"./TextInput.5e5dc438.js";import"./InputError.3b73b482.js";import"./InputLabel.e621701c.js";import"./ActionMessage.62048221.js";import"./tiptap-starter-kit.esm.35f7a59b.js";const d={class:"max-w-2xl mx-auto pt-12 pb-20 px-4"},u={class:"card bg-white"},h={id:"employment",class:"card bg-white mt-10"},p=e("h2",{class:"text-center"},"Work History",-1),f={class:"card bg-white mt-10"},k=e("h2",{class:"text-center mb-4"},"Your Skills",-1),w={class:"card bg-white mt-10"},x=e("h2",{class:"text-center mb-4"},"Social Accounts",-1),b={class:"card bg-white mt-10"},$=e("h2",{class:"text-center mb-4"},"Your Resume",-1),q={__name:"Index",props:{user:Object},setup(t){return(g,v)=>(l(),n(o,{title:"Worker Profile"},{default:_(()=>[e("section",d,[e("div",u,[s(m,{user:t.user},null,8,["user"])]),e("div",h,[p,s(r,{employments:t.user.worker.employments},null,8,["employments"])]),e("div",f,[k,s(i,{skills:t.user.worker.worker_skills},null,8,["skills"])]),e("div",w,[x,s(c,{worker:t.user.worker},null,8,["worker"])]),e("div",b,[$,s(a,{resume:t.user.worker.resume},null,8,["resume"])])])]),_:1}))}};export{q as default};