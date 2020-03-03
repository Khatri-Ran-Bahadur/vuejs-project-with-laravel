import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter)

const routes=[
  	{ path: '/postaladmin/dashboard', component: require('./components/Dashboard.vue').default },
  	{ path: '/developer', component: require('./components/Developer.vue').default },
    { path: '/postaladmin/profile', component: require('./components/Profile.vue').default },
    { path: '/users', component: require('./components/Users.vue').default },
    { path: '/postaladmin/about', component: require('./components/admin/settings/About.vue').default },
    { path: '/postaladmin/contact-us', component: require('./components/admin/settings/Contactus.vue').default },
    { path: '/postaladmin/underneath-organizations', component: require('./components/admin/settings/pages/UndeneathOrganization.vue').default },
    { path: '/postaladmin/organization-chart', component: require('./components/admin/settings/pages/OrganizationChart.vue').default },
    { path: '/postaladmin/policy-and-programmes', component: require('./components/admin/settings/pages/PolicyAndProgramms.vue').default },
    { path: '/postaladmin/staff', component: require('./components/admin/settings/pages/Staff.vue').default },
    { path: '/postaladmin/postal-rates', component: require('./components/admin/settings/pages/PostalRates.vue').default },
    { path: '/postaladmin/newslist', component: require('./components/admin/settings/pages/Newslist.vue').default },



    { path: '/', component: require('./components/public/Home.vue').default },
    { path: '/about-postal-service-saylan', component: require('./components/public/pages/About.vue').default },
    { path: '/contact-us', component: require('./components/public/pages/Contactus.vue').default },
    { path: '/underneath-organizations', component: require('./components/public/pages/UndeneathOrganization.vue').default },
    { path: '/organization-chart', component: require('./components/public/pages/OrganizationChart.vue').default },
    { path: '/citizen-charter', component: require('./components/public/pages/CitizenCharter.vue').default },
    { path: '/policy-and-programmes', component: require('./components/public/pages/PolicyAndProgramms.vue').default },
    { path: '/staff', component: require('./components/public/pages/Staff.vue').default },
    { path: '/act-regulations', component: require('./components/public/pages/ActRegulations.vue').default },
    { path: '/notice', component: require('./components/public/pages/Notice.vue').default },
    
    { path: '/presslist', component: require('./components/public/pages/Presslist.vue').default },
    { path: '/newslist', component: require('./components/public/pages/Newslist.vue').default },
    { path: '/tender', component: require('./components/public/pages/Tender.vue').default },
    { path: '/circular', component: require('./components/public/pages/Circular.vue').default },
    { path: '/activities', component: require('./components/public/pages/Activities.vue').default },
    { path: '/postal-rates', component: require('./components/public/pages/PostalRates.vue').default },



    { path: '/postaladmin/*', component: require('./components/NotFound.vue').default },
    { path: '/*', component: require('./components/NotFound.vue').default }
]

export default new VueRouter({mode:'history',routes})