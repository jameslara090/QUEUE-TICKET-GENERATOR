<script setup>
import { ref } from "vue";
import ApplicationLogo from "@/Components/ApplicationLogo.vue";
import Dropdown from "@/Components/Dropdown.vue";
import DropdownLink from "@/Components/DropdownLink.vue";
import NavLink from "@/Components/NavLink.vue";
import ResponsiveNavLink from "@/Components/ResponsiveNavLink.vue";
import { Link } from "@inertiajs/vue3";

const showingNavigationDropdown = ref(false);
</script>

<template>
    <div>
        <div class="min-h-screen bg-gray-100">
            <nav class="border-b border-gray-100 bg-white">
                <!-- Primary Navigation Menu -->
                <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                    <div class="flex h-16 justify-between">
                        <div class="flex">
                            <!-- Logo -->
                            <div class="flex shrink-0 items-center p-5">
                                <Link :href="route('dashboard')">
                                    <ApplicationLogo
                                        class="block w-40 fill-current text-gray-800"
                                    />
                                </Link>
                            </div>

                            <!-- Navigation Links -->
                            <!-- <div
                                class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex"
                            >
                                <NavLink
                                    :href="route('dashboard')"
                                    :active="route().current('dashboard')"
                                >
                                YWA HUMAN RESOURCE CORPORATION
                                </NavLink>
                            </div> -->
                        </div>

                        <div class="hidden sm:ms-6 sm:flex sm:items-center">
                            <!-- Settings Dropdown -->
                            <div class="relative ms-3">
                                <Dropdown align="right" width="48">
                                    <template #trigger>
                                        <span class="inline-flex rounded-md">
                                            <button
                                                type="button"
                                                class="inline-flex items-center rounded-md border border-transparent bg-white px-3 py-2 text-sm font-medium leading-4 text-gray-500 transition duration-150 ease-in-out hover:text-gray-700 focus:outline-none"
                                            >
                                                {{ $page.props.auth.user.name }}

                                                <svg
                                                    class="-me-0.5 ms-2 h-4 w-4"
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
                                        <DropdownLink
                                            :href="route('profile.edit')"
                                        >
                                            Profile
                                        </DropdownLink>
                                        <DropdownLink
                                            :href="route('logout')"
                                            method="post"
                                            as="button"
                                        >
                                            Log Out
                                        </DropdownLink>
                                    </template>
                                </Dropdown>
                            </div>
                        </div>

                        <!-- Hamburger -->
                        <div class="-me-2 flex items-center sm:hidden">
                            <button
                                @click="
                                    showingNavigationDropdown =
                                        !showingNavigationDropdown
                                "
                                class="inline-flex items-center justify-center rounded-md p-2 text-gray-400 transition duration-150 ease-in-out hover:bg-gray-100 hover:text-gray-500 focus:bg-gray-100 focus:text-gray-500 focus:outline-none"
                            >
                                <svg
                                    class="h-6 w-6"
                                    stroke="currentColor"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        :class="{
                                            hidden: showingNavigationDropdown,
                                            'inline-flex':
                                                !showingNavigationDropdown,
                                        }"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M4 6h16M4 12h16M4 18h16"
                                    />
                                    <path
                                        :class="{
                                            hidden: !showingNavigationDropdown,
                                            'inline-flex':
                                                showingNavigationDropdown,
                                        }"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12"
                                    />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Responsive Navigation Menu -->
                <div
                    :class="{
                        block: showingNavigationDropdown,
                        hidden: !showingNavigationDropdown,
                    }"
                    class="sm:hidden"
                >
                    <!-- <div class="space-y-1 pb-3 pt-2">
                        <ResponsiveNavLink
                            :href="route('dashboard')"
                            :active="route().current('dashboard')"
                        >
                            Dashboard
                        </ResponsiveNavLink>
                    </div> -->

                    <!-- Responsive Settings Options -->
                    <div class="border-t border-gray-200 pb-1 pt-4">
                        <div class="px-4">
                            <div class="text-base font-medium text-gray-800">
                                {{ $page.props.auth.user.name }}
                            </div>
                            <div class="text-sm font-medium text-gray-500">
                                {{ $page.props.auth.user.email }}
                            </div>
                        </div>

                        <div class="mt-3 space-y-1">
                            <ResponsiveNavLink :href="route('profile.edit')">
                                Profile
                            </ResponsiveNavLink>
                            <ResponsiveNavLink
                                :href="route('logout')"
                                method="post"
                                as="button"
                            >
                                Log Out
                            </ResponsiveNavLink>
                        </div>
                    </div>
                </div>
            </nav>

            <!-- Page Heading -->
            <header class="bg-indigo-800 shadow">
                <div class="mx-auto max-w-7xl px-1 py-2 sm:px-6 lg:px-8">
                    <div
                        class="p-4 flex flex-wrap items-center justify-between space-y-4 md:space-y-0 md:space-x-4"
                    >
                        <!-- Left-aligned Download button -->

                        <!-- Right-aligned Previous/Next controls -->
                        <div class="flex space-x-2">
                            <button
                                class="p-3 rounded-xl bg-blue-600 hover:bg-blue-500 text-white font-bold"
                                @click="prevPage"
                                :disabled="currentPage === 1"
                            >
                                Prev
                            </button>
                                <button
                                class="p-3 rounded-xl bg-blue-600 hover:bg-blue-500 text-white font-bold"
                                @click="nextPage"
                                :disabled="currentPage === totalPages"
                            >
                                Next
                            </button>
                            <span class="p-2 text-white"
                                >Page {{ currentPage }} of
                                {{ totalPages }}</span
                            >
                        
                            <button
                                class="flex items-center justify-center space-x-2 rounded-xl p-2 bg-blue-600 hover:bg-blue-500 text-white font-bold"
                                @click="download"
                            >
                                <i class="fas fa-download"></i>
                                <span>Download PDF</span>
                            </button>
                        </div>

                        <!-- Input fields for currentDate and totalCards -->
                        <div class="flex items-center space-x-4">
                            <div class="flex flex-col">
                                <label
                                    for="totalCards"
                                    class="font-bold text-white text-sm"
                                    >Total Cards</label
                                >
                                <input
                                    id="totalCards"
                                    type="number"
                                    v-model.number="totalCards"
                                    class="p-2 border border-gray-300 rounded w-24"
                                />
                            </div>

                            <div class="flex flex-col">
                                <label
                                    for="currentDate"
                                    class="font-bold text-white text-sm"
                                    >Current Date</label
                                >
                                <input
                                    id="currentDate"
                                    type="date"
                                    v-model="currentDate"
                                    class="outline-2 outline- p-2 border border-gray-300 rounded"
                                />
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Page Content -->
            <main>
                <div ref="content">
                    <section class="py-2 bg-white-50">
                        <div class="container-xl lg:container m-auto">
                            <div
                                class="grid grid-cols-1 md:grid-cols-5 gap-4 p-4 rounded-lg"
                            >
                                <!-- Loop through current page cards -->
                                <Card
                                    v-for="(index, i) in paginatedCards"
                                    :key="i"
                                    class="border-2 border-black p-3 text-center"
                                >
                                    <img
                                        src="../../img/YWA-LOGO.png"
                                        alt=""
                                    />
                                    <div
                                        class="p-1 pt-2 flex flex-col items-center justify-center"
                                    >
                                        <h2
                                            id="q_number"
                                            class="border-4 border-double border-black text-5xl font-extrabold"
                                            style="padding: 20px 20px 50px 20px"
                                        >
                                            {{ String(index).padStart(3, "0") }}
                                        </h2>
                                    </div>
                                    <div>
                                        <h2 class="text-2xl font-extrabold">
                                            NEW APPLICANT
                                        </h2>
                                    </div>
                                    <p class="mt-3 mb-3">Window 1 to 6</p>
                                    <p class="mt-2 text-gray-600">
                                        {{ formattedDate }}
                                    </p>
                                </Card>
                            </div>

                            <!-- Pagination Controls -->
                        </div>
                    </section>
                </div>
            </main>
        </div>
    </div>
</template>

<script>
import jsPDF from "jspdf";
import html2canvas from "html2canvas";

export default {
  data() {
    return {
      totalCards: 1000, // Total number of cards
      cardsPerPage: 25, // Cards displayed per page
      currentPage: 1, // Current page in the pagination
      currentDate: new Date().toISOString().substr(0, 10), // ISO format for default date
    };
  },
  computed: {
    // Calculate the total number of pages
    totalPages() {
      return Math.ceil(this.totalCards / this.cardsPerPage);
    },

    // Cards to display on the current page
    paginatedCards() {
      const start = (this.currentPage - 1) * this.cardsPerPage + 1;
      const end = this.currentPage * this.cardsPerPage;
      return Array.from(
        { length: this.cardsPerPage },
        (_, i) => start + i
      ).filter((n) => n <= this.totalCards);
    },

    // Format the current date
    formattedDate() {
      return new Date(this.currentDate).toLocaleDateString();
    },
  },
  methods: {
    // Navigate to the previous page
    prevPage() {
      if (this.currentPage > 1) {
        this.currentPage--;
      }
    },

    // Navigate to the next page
    nextPage() {
      if (this.currentPage < this.totalPages) {
        this.currentPage++;
      }
    },

    // Function to download all cards into PDF
    async download() {
      try {
        const content = this.$refs.content;

        // Use html2canvas to capture the content as an image
        const canvas = await html2canvas(content, {
          scale: 2, // Higher scale for better resolution
          useCORS: true, // Ensure cross-origin images are captured properly
        });

        const imgData = canvas.toDataURL("image/png");
        const doc = new jsPDF("p", "mm", "a4"); // 'p' for portrait, 'mm' for millimeters, 'a4' for paper size

        // Define margins
        const marginLeft = 2;
        const marginTop = 2;

        // Set A4 size dimensions (A4: 210mm x 297mm)
        const pageWidth = 210;
        const pageHeight = 297;
        const width = pageWidth - marginLeft * 2;
        const height = (canvas.height * width) / canvas.width; // Adjust height based on the width

        let currentHeight = 0; // Track the height position for each page

        // Iterate over the content to add it to multiple pages
        while (currentHeight < height) {
          doc.addImage(
            imgData,
            "PNG",
            marginLeft,
            marginTop - currentHeight, // Apply marginTop and track currentHeight
            width,
            height
          );

          // Check if there is more content to add
          currentHeight += pageHeight - marginTop * 2; // Adjust for margins

          // Add new page if there is more content
          if (currentHeight < height) {
            doc.addPage();
          }
        }
        const formattedDate = new Date(this.currentDate)
          .toLocaleDateString("en-GB")
          .replace(/\//g, "-");
        // Save the PDF
        doc.save(`YWA-${formattedDate}.pdf`);
      } catch (error) {
        console.error("Error generating PDF:", error);
      }
    },
  },
};
</script>

