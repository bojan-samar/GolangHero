import{_ as o}from"./AppLayout.06783d59.js";import r from"./UpdateEmployment.c7ba7e82.js";import i from"./UpdateSkills.aa60367a.js";import c from"./UpdateSocials.37e19714.js";import m from"./UpdateUsername.0ede76d4.js";import a from"./UpdateResume.6e54a0c2.js";import{o as l,c as n,w as _,a as e,b as s}from"./app.56894289.js";import"./Banner.8b7eaae7.js";import"./PrimaryButton.bdc70df2.js";import"./OutlineButton.e1189c0b.js";import"./TextInput.33bedeaa.js";import"./InputError.ab07c3cf.js";import"./InputLabel.a67705b9.js";import"./ActionMessage.f948754f.js";import"./tiptap-starter-kit.esm.a1ab6a66.js";const d={class:"max-w-2xl mx-auto pt-12 pb-20 px-4"},u={class:"card bg-white"},h={id:"employment",class:"card bg-white mt-10"},p=e("h2",{class:"text-center"},"Work History",-1),f={class:"card bg-white mt-10"},k=e("h2",{class:"text-center mb-4"},"Your Skills",-1),w={class:"card bg-white mt-10"},x=e("h2",{class:"text-center mb-4"},"Social Accounts",-1),b={class:"card bg-white mt-10"},$=e("h2",{class:"text-center mb-4"},"Your Resume",-1),q={__name:"Index",props:{user:Object},setup(t){return(g,v)=>(l(),n(o,{title:"Worker Profile"},{default:_(()=>[e("section",d,[e("div",u,[s(m,{user:t.user},null,8,["user"])]),e("div",h,[p,s(r,{employments:t.user.worker.employments},null,8,["employments"])]),e("div",f,[k,s(i,{skills:t.user.worker.worker_skills},null,8,["skills"])]),e("div",w,[x,s(c,{worker:t.user.worker},null,8,["worker"])]),e("div",b,[$,s(a,{resume:t.user.worker.resume},null,8,["resume"])])])]),_:1}))}};export{q as default};