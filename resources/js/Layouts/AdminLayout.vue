<!--https://www.tailwindawesome.com/?category=29-->
<script setup>
import { ref } from 'vue';
import { Inertia } from '@inertiajs/inertia';
import { Head, Link } from '@inertiajs/inertia-vue3';
import ApplicationMark from '@/Components/ApplicationMark.vue';
import Banner from '@/Components/Banner.vue';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import NavLink from '@/Components/NavLink.vue';
import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';

defineProps({
    title: String,
});

const showingNavigationDropdown = ref(false);
const showingSidebar = ref(false);
const sidebar = ref();
const overlay = ref();


const logout = (team) => {
    Inertia.post(route("logout"));
};

const toggleSidebar = () => {
    sidebar.value.classList.toggle('-translate-x-full');
    overlay.value.classList.toggle('hidden');
};
</script>


<template>
    <div>
        <Head :title="title"/>

        <template v-if="$slots.meta">
            <slot name="meta"></slot>
        </template>

        <div class="flex h-screen bg-white font-roboto">
            <div id="sidebar" class="flex">
                <div @click="toggleSidebar" ref="overlay"
                     class="hidden fixed inset-0 z-20 transition-opacity bg-black opacity-50"></div>
                <div
                    ref="sidebar"
                    class="-translate-x-full ease-in fixed inset-y-0 left-0 z-30 w-64 overflow-y-auto transition duration-300 transform bg-white lg:translate-x-0 lg:static lg:inset-0">
                    <div class="flex justify-between mt-4 px-4">
                        <!--                        <img src="/storage/icon/logo.svg" alt="Targeting Scout" class="h-8 w-8">-->
                        <svg @click="toggleSidebar" xmlns="http://www.w3.org/2000/svg"
                             class="h-6 w-6 bg-gray-200 rounded md:hidden cursor-pointer" fill="none"
                             viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </div>

                    <nav class="mt-8 text-sm">

                        <Link :class="{'bg-gray-100' : route().current('admin.blog.index')}"
                              class="flex items-center px-4 py-2.5 duration-200 hover:bg-gray-100"
                              :href="route('admin.blog.index')">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-1" fill="none" viewBox="0 0 24 24"
                                 stroke="currentColor" stroke-width="1.3">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                            </svg>
                            <span>Blog</span>
                        </Link>

                        <Link :class="{'bg-gray-100' : route().current('admin.application.*')}"
                              class="flex items-center px-4 py-2.5 duration-200 hover:bg-gray-100"
                              :href="route('admin.application.index')">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.3">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                            </svg>
                            <span>Applications</span>
                        </Link>

                        <Link :class="{'bg-gray-100' : route().current('admin.company.*')}"
                              class="flex items-center px-4 py-2.5 duration-200 hover:bg-gray-100"
                              :href="route('admin.company.index')">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.3">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                            </svg>
                            <span>Companies</span>
                        </Link>

                        <Link :class="{'bg-gray-100' : route().current('admin.job.*')}"
                              class="flex items-center px-4 py-2.5 duration-200 hover:bg-gray-100"
                              :href="route('admin.job.index')">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6 mr-1">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 00.75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 00-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0112 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 01-.673-.38m0 0A2.18 2.18 0 013 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 013.413-.387m7.5 0V5.25A2.25 2.25 0 0013.5 3h-3a2.25 2.25 0 00-2.25 2.25v.894m7.5 0a48.667 48.667 0 00-7.5 0M12 12.75h.008v.008H12v-.008z" />
                            </svg>

                            <span>Jobs</span>
                        </Link>

                        <Link :class="{'bg-gray-100' : route().current('admin.job-import.*')}"
                              class="flex items-center px-4 py-2.5 duration-200 hover:bg-gray-100"
                              :href="route('admin.job-import.index')">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.3">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                            </svg>
                            <span>Job Import</span>
                        </Link>

                        <div @click="logout"
                             class="flex items-center px-4 py-2.5 duration-200 hover:bg-gray-100 cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.3">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                            </svg>
                            Log Out
                        </div>
                    </nav>
                </div>
            </div>

            <div id="main" class="flex-1 flex flex-col overflow-hidden">
                <header class="flex items-center justify-between px-6 py-4 bg-white">
                    <div class="flex items-center">
                        <button id="toggle-sidebar" @click="toggleSidebar"
                                class="text-gray-500 focus:outline-none lg:hidden">
                            <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M4 6H20M4 12H20M4 18H11" stroke="currentColor" stroke-width="2"
                                      stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                        </button>
                    </div>


                </header>

                <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100 rounded-2xl" scroll-region>
                    <banner />

                    <div class="pt-12 pb-20 px-4">
                        <slot></slot>
                    </div>
                </main>

            </div>

        </div>

    </div>
</template>
