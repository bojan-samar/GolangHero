import{_ as p}from"./AppLayout.a5288340.js";import c from"./DeleteUserForm.df015898.js";import l from"./LogoutOtherBrowserSessionsForm.af55f12c.js";import{S as s}from"./SectionBorder.0dcc29cd.js";import f from"./TwoFactorAuthenticationForm.8ff86680.js";import u from"./UpdatePasswordForm.6566b20a.js";import _ from"./UpdateProfileInformationForm.315d289c.js";import{o as e,c as d,w as n,a as i,e as r,b as t,f as a,F as h}from"./app.6ba52187.js";import"./Banner.7d6eb250.js";import"./ActionSection.a4dd5d68.js";import"./SectionTitle.0d47c5d9.js";import"./_plugin-vue_export-helper.cdc0426e.js";import"./DangerButton.876eeaee.js";import"./DialogModal.3b5867d6.js";import"./TextInput.07adf577.js";import"./SecondaryButton.3dc49c88.js";import"./ActionMessage.cb0df06b.js";import"./PrimaryButton.5a467a16.js";import"./InputLabel.0a6e53c4.js";import"./FormSection.89ec8e55.js";const g=i("h2",{class:"font-semibold text-xl text-gray-800 leading-tight"}," Profile ",-1),$={class:"max-w-7xl mx-auto py-10 sm:px-6 lg:px-8"},w={key:0},k={key:1},y={key:2},H={__name:"Show",props:{confirmsTwoFactorAuthentication:Boolean,sessions:Array},setup(m){return(o,x)=>(e(),d(p,{title:"Profile"},{header:n(()=>[g]),default:n(()=>[i("div",null,[i("div",$,[o.$page.props.jetstream.canUpdateProfileInformation?(e(),r("div",w,[t(_,{user:o.$page.props.user},null,8,["user"]),t(s)])):a("",!0),o.$page.props.jetstream.canUpdatePassword?(e(),r("div",k,[t(u,{class:"mt-10 sm:mt-0"}),t(s)])):a("",!0),o.$page.props.jetstream.canManageTwoFactorAuthentication?(e(),r("div",y,[t(f,{"requires-confirmation":m.confirmsTwoFactorAuthentication,class:"mt-10 sm:mt-0"},null,8,["requires-confirmation"]),t(s)])):a("",!0),t(l,{sessions:m.sessions,class:"mt-10 sm:mt-0"},null,8,["sessions"]),o.$page.props.jetstream.hasAccountDeletionFeatures?(e(),r(h,{key:3},[t(s),t(c,{class:"mt-10 sm:mt-0"})],64)):a("",!0)])])]),_:1}))}};export{H as default};