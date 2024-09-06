<script setup>
import { ref } from "vue";
import ApplicationLogo from "@/Components/ApplicationLogo.vue";
import Dropdown from "@/Components/Dropdown.vue";
import DropdownLink from "@/Components/DropdownLink.vue";
// import SidebarLink from "@/Components/SidebarLink.vue"; // You may need to create this component
import { Link } from "@inertiajs/vue3";

const showingSidebar = ref(true);
</script>

<template>
  <div class="flex min-h-screen bg-gray-100">
    <!-- Sidebar -->
    <aside class="w-64 bg-white dark: bg-violet-900 text-white-50">
      <div class="h-16 flex items-center justify-center">
        <a
          href="http://lemi-app.test/dashboard"
          class="flex items-center space-x-2"
        >
          <svg
            width="50"
            height="49"
            viewBox="0 0 50 49"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path
              d="M39.6248 40.2042L10.8546 39.5632C10.0858 39.3345 10.4736 39.4323 10.8546 39.5632C11.2356 39.694 11.7386 39.5804 10.8546 39.5632L4.84783 16.1745C4.78237 15.9196 4.58736 14.313 4.35749 14.2652C4.12761 14.2175 3.84437 14.9127 3.67464 15.115L2.2075 17.8276C1.9485 18.1438 1.87369 18.5168 1.97176 18.8986L5.40419 32.2636C5.89748 34.1843 6.52831 36.4337 6.99782 38.4687C7.46733 40.5037 7.91355 42.0343 8.34628 43.7192C13.7705 43.7407 16.9647 43.6357 21.1047 43.673L35.306 43.2775C35.7152 43.2799 35.0582 43.5738 35.306 43.2775L39.6248 40.2042C39.5344 40.2261 40.1057 40.0878 39.6248 40.2042Z"
              fill="url(#paint0_linear_15_2431)"
            ></path>
            <path
              d="M13.5632 35.8717C13.9004 37.1847 13.364 35.0963 13.6858 36.3492C16.0644 36.5341 23.2423 36.2553 23.9202 36.4077C19.2384 35.774 24.6534 36.2586 23.9202 36.4077L36.2305 36.6271L41.618 36.6467C42.0298 36.6464 42.4131 36.4715 42.6638 36.1785L46.7663 31.4612L50.6053 27.0551C50.8685 26.7429 50.9699 26.338 50.8738 25.9637L47.7952 14.0448C45.8577 6.50117 38.7102 1.22871 30.4105 1.2182L16.6546 1.18745C16.2428 1.18772 15.8595 1.36264 15.6088 1.6556L11.5063 6.37291L7.66726 10.779C7.40407 11.0912 7.30265 11.4961 7.39879 11.8704L8.61966 16.6239L10.988 25.8453L13.5632 35.8717ZM18.3801 30.9957L14.9915 17.8698C14.8606 17.3599 15.2641 16.8738 15.8104 16.8764L30.255 16.9981C30.8537 17.0053 31.3817 17.4019 31.5247 17.9586L34.9123 31.0847C35.043 31.5937 34.6407 32.0805 34.0941 32.0769L19.6488 31.9564C19.0511 31.9489 18.5231 31.5524 18.3801 30.9957ZM13.1047 6.40898L39.0603 6.63417C39.658 6.64164 40.186 7.03821 40.329 7.59491L46.4268 31.2056C46.5575 31.7146 46.155 32.2005 45.6086 32.1978L41.7667 32.1642C41.3204 32.1535 40.9224 31.8614 40.8162 31.4479L39.1198 24.8429C37.1292 17.1599 29.994 11.7364 21.7116 11.6619L14.1281 11.5875C13.6819 11.5769 13.2839 11.2847 13.1775 10.8703L12.2865 7.40118C12.1557 6.89223 12.558 6.40538 13.1047 6.40898Z"
              fill="url(#paint1_linear_15_2431)"
            ></path>
            <defs>
              <linearGradient
                id="paint0_linear_15_2431"
                x1="19.9275"
                y1="5.35457"
                x2="17.7925"
                y2="57.211"
                gradientUnits="userSpaceOnUse"
              >
                <stop stop-color="#04D5C9"></stop>
                <stop offset="0.524476" stop-color="#6A44C4"></stop>
                <stop offset="1" stop-color="#6A44C4"></stop>
              </linearGradient>
              <linearGradient
                id="paint1_linear_15_2431"
                x1="28.7808"
                y1="-7.61088"
                x2="27.5539"
                y2="51.6206"
                gradientUnits="userSpaceOnUse"
              >
                <stop stop-color="#04D5C9"></stop>
                <stop offset="0.524476" stop-color="#6A44C4"></stop>
                <stop offset="1" stop-color="#6A44C4"></stop>
              </linearGradient>
            </defs>
          </svg>
          <h3 class="font-poppins">LEMI Finance</h3>
        </a>
      </div>

      <nav class="mt-10">
        <ul class="p-4 space-y-4 dark: text-white-50">
          <li class="bg-violet-500 p-4 rounded-lg">
            <Link
              :href="route('dashboard')"
              :active="route().current('dashboard')"
            >
              Dashboard
            </Link>
          </li>
          <li class="bg-violet-500 p-4 rounded-lg">
            <Link
              :href="route('dashboard')"
              :active="route().current('dashboard')"
            >
              Solicitudes
            </Link>
          </li>
          <li class="bg-violet-500 p-4 rounded-lg">
            <Link
              :href="route('dashboard')"
              :active="route().current('dashboard')"
            >
              Mi Empresa
            </Link>
          </li>
          <li class="bg-violet-500 p-4 rounded-lg">
            <Link
              :href="route('dashboard')"
              :active="route().current('dashboard')"
            >
              Mi cuenta
            </Link>
          </li>
          <!-- Add more sidebar links here -->
        </ul>
      </nav>
      <div class="absolute dark:border-gray-700">
        <div class="p-4">
          <!-- Settings Dropdown -->
          <Dropdown align="left">
            <template #trigger>
              <span class="inline-flex rounded-md">
                <button
                  type="button"
                  class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150"
                >
                  {{ $page.props.auth.user.name }}

                  <svg
                    class="ms-2 -me-0.5 h-4 w-4"
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 20 20"
                    fill="currentColor"
                  >
                    <path
                      fill-rule="evenodd"
                      d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                      clip-rule="evenodd"
                    />
                  </svg>
                </button>
              </span>
            </template>

            <template #content>
              <DropdownLink :href="route('profile.edit')">
                Profile
              </DropdownLink>
              <DropdownLink :href="route('logout')" method="post" as="button">
                Log Out
              </DropdownLink>
            </template>
          </Dropdown>
        </div>
      </div>
    </aside>

    <!-- Main Content -->
    <div class="flex-1 flex flex-col">
      <!-- Page Heading -->
      <header class="bg-white dark:bg-gray-800 shadow" v-if="$slots.header">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
          <slot name="header" />
        </div>
      </header>

      <!-- Page Content -->
      <main class="flex-1 bg-custom-gradient">
        <slot />
      </main>
    </div>
  </div>
</template>

<style>
/* Ensure sidebar and main content area take full height */
html,
body {
  height: 100%;
  margin: 0;
}

.flex {
  display: flex;
}
</style>
