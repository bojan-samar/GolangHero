import{_ as o}from"./AppLayout.45829db0.js";import r from"./UpdateEmployment.ff191b26.js";import i from"./UpdateSkills.19b04afb.js";import m from"./UpdateSocials.cedba378.js";import c from"./UpdateUsername.45fbe4d0.js";import a from"./UpdateResume.72157a71.js";import{o as l,c as n,w as _,a as e,b as s}from"./app.3247dd9a.js";import"./Banner.fd5761c9.js";import"./PrimaryButton.c2c54cde.js";import"./OutlineButton.7aafd287.js";import"./TextInput.76c9102b.js";import"./InputError.cda445be.js";import"./InputLabel.07deb51a.js";import"./ActionMessage.a4e57d7a.js";import"./tiptap-vue-3.esm.87a1a393.js";import"./tiptap-starter-kit.esm.27a94095.js";const d={class:"max-w-2xl mx-auto pt-12 pb-20 px-4"},u={class:"card bg-white"},h={id:"employment",class:"card bg-white mt-10"},p=e("h2",{class:"text-center"},"Work History",-1),f={class:"card bg-white mt-10"},k=e("h2",{class:"text-center mb-4"},"Your Skills",-1),w={class:"card bg-white mt-10"},x=e("h2",{class:"text-center mb-4"},"Social Accounts",-1),b={class:"card bg-white mt-10"},$=e("h2",{class:"text-center mb-4"},"Your Resume",-1),z={__name:"Index",props:{user:Object},setup(t){return(g,v)=>(l(),n(o,{title:"Worker Profile"},{default:_(()=>[e("section",d,[e("div",u,[s(c,{user:t.user},null,8,["user"])]),e("div",h,[p,s(r,{employments:t.user.worker.employments},null,8,["employments"])]),e("div",f,[k,s(i,{skills:t.user.worker.worker_skills},null,8,["skills"])]),e("div",w,[x,s(m,{worker:t.user.worker},null,8,["worker"])]),e("div",b,[$,s(a,{resume:t.user.worker.resume},null,8,["resume"])])])]),_:1}))}};export{z as default};
