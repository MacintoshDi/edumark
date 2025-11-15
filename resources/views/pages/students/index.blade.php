<x-layouts.app title="Student Directory">
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8" x-data="{
        activeCohort: null,
        searchQuery: '',
        students: [
            { id: 1, name: 'Daniel Wilson', role: 'Digital Marketing Specialist', location: 'New York, USA', cohortId: 1, verified: true, avatar: 'https://i.imgur.com/L6epf2S.jpg', skills: ['SEO', 'Content Marketing', 'Analytics'], social: { linkedin: '#', twitter: '#' } },
            { id: 2, name: 'David Anderson', role: 'Growth Marketing Manager', location: 'San Francisco, USA', cohortId: 1, verified: false, avatar: 'https://i.imgur.com/ncn2a2s.jpg', skills: ['Growth Hacking', 'A/B Testing'], social: { linkedin: '#' } },
            { id: 3, name: 'Emily Davis', role: 'Social Media Manager', location: 'London, UK', cohortId: 2, verified: true, avatar: 'https://i.imgur.com/D886a1f.jpg', skills: ['Social Media', 'Branding', 'Copywriting'], social: { twitter: '#' } },
            { id: 4, name: 'Michael Brown', role: 'Content Strategist', location: 'Toronto, Canada', cohortId: 2, verified: false, avatar: 'https://i.imgur.com/L6epf2S.jpg', skills: ['Content Strategy', 'SEO'], social: { linkedin: '#' } },
            { id: 5, name: 'Sarah Johnson', role: 'Video Marketing Specialist', location: 'Los Angeles, USA', cohortId: 3, verified: true, avatar: 'https://i.imgur.com/ncn2a2s.jpg', skills: ['Video Production', 'YouTube'], social: { linkedin: '#', twitter: '#' } },
            { id: 6, name: 'James Miller', role: 'Email Marketing Expert', location: 'Sydney, Australia', cohortId: 4, verified: false, avatar: 'https://i.imgur.com/D886a1f.jpg', skills: ['Email Marketing', 'Automation'], social: { linkedin: '#' } }
        ],
        get filteredStudents() {
            let filtered = this.students;
            if (this.activeCohort !== null) {
                filtered = filtered.filter(s => s.cohortId === this.activeCohort);
            }
            if (this.searchQuery.trim() !== '') {
                filtered = filtered.filter(s => s.name.toLowerCase().includes(this.searchQuery.toLowerCase()));
            }
            return filtered;
        }
    }">
        
        {{-- Header Section --}}
        <section class="bg-white rounded-2xl p-8 lg:p-12 mb-8">
            <div class="grid lg:grid-cols-2 gap-8 items-center">
                <div>
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-12 h-12 bg-indigo-100 rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                            </svg>
                        </div>
                    </div>
                    <h1 class="text-4xl lg:text-5xl font-bold text-gray-900 mb-4">Student Directory</h1>
                    <p class="text-lg text-gray-600 leading-relaxed">
                        Looking for other students to connect with? Browse through all of them here!
                    </p>
                </div>
                <div class="relative flex justify-center lg:justify-end">
                    {{-- Decorative shapes --}}
                    <div class="absolute w-32 h-32 bg-purple-200 rounded-full opacity-30 blur-2xl top-0 left-0"></div>
                    <div class="absolute w-40 h-40 bg-blue-200 rounded-full opacity-30 blur-2xl bottom-0 right-0"></div>
                    <div class="absolute w-24 h-24 bg-indigo-200 rounded-full opacity-30 blur-2xl top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2"></div>
                    
                    {{-- Directory Icon --}}
                    <img src="https://i.imgur.com/zJ5rBgS.png" alt="Student Directory" class="relative z-10 w-64 h-auto">
                </div>
            </div>
        </section>

        {{-- Filters Section --}}
        <section class="mb-8">
            {{-- Search --}}
            <div class="mb-6">
                <div class="relative max-w-md">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </div>
                    <input 
                        type="text" 
                        x-model="searchQuery"
                        placeholder="Search students by name..." 
                        class="block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-xl leading-5 bg-white placeholder-gray-500 focus:outline-none focus:placeholder-gray-400 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                </div>
            </div>

            {{-- Cohort Filters --}}
            <div class="flex flex-wrap gap-2">
                <button 
                    @click="activeCohort = null"
                    :class="activeCohort === null ? 'bg-indigo-600 text-white' : 'bg-white text-gray-700 hover:bg-gray-50'"
                    class="px-4 py-2 border border-gray-300 rounded-lg font-medium transition-colors">
                    All
                </button>
                <button 
                    @click="activeCohort = 1"
                    :class="activeCohort === 1 ? 'bg-indigo-600 text-white' : 'bg-white text-gray-700 hover:bg-gray-50'"
                    class="px-4 py-2 border border-gray-300 rounded-lg font-medium transition-colors">
                    Cohort 1
                </button>
                <button 
                    @click="activeCohort = 2"
                    :class="activeCohort === 2 ? 'bg-indigo-600 text-white' : 'bg-white text-gray-700 hover:bg-gray-50'"
                    class="px-4 py-2 border border-gray-300 rounded-lg font-medium transition-colors">
                    Cohort 2
                </button>
                <button 
                    @click="activeCohort = 3"
                    :class="activeCohort === 3 ? 'bg-indigo-600 text-white' : 'bg-white text-gray-700 hover:bg-gray-50'"
                    class="px-4 py-2 border border-gray-300 rounded-lg font-medium transition-colors">
                    Cohort 3
                </button>
                <button 
                    @click="activeCohort = 4"
                    :class="activeCohort === 4 ? 'bg-indigo-600 text-white' : 'bg-white text-gray-700 hover:bg-gray-50'"
                    class="px-4 py-2 border border-gray-300 rounded-lg font-medium transition-colors">
                    Cohort 4
                </button>
            </div>
        </section>

        {{-- Students Grid --}}
        <section class="grid md:grid-cols-2 lg:grid-cols-3 gap-6 mb-12">
            <template x-for="student in filteredStudents" :key="student.id">
                <article class="bg-white rounded-xl border border-gray-200 p-6 hover:shadow-lg transition-shadow">
                    {{-- Header --}}
                    <div class="flex items-start gap-4 mb-4">
                        <img :src="student.avatar" :alt="student.name" class="w-16 h-16 rounded-full object-cover">
                        <div class="flex-1">
                            <div class="flex items-center gap-2 mb-1">
                                <span class="font-bold text-gray-900" x-text="student.name"></span>
                                <template x-if="student.verified">
                                    <svg class="w-5 h-5 text-blue-500" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                    </svg>
                                </template>
                            </div>
                            <p class="text-sm text-gray-500" x-text="student.role"></p>
                        </div>
                    </div>

                    {{-- Location --}}
                    <div class="mb-4">
                        <p class="text-xs font-semibold text-gray-500 uppercase mb-1">Location</p>
                        <p class="text-sm text-gray-700 flex items-center gap-1">
                            <svg class="w-4 h-4 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
                            </svg>
                            <span x-text="student.location"></span>
                        </p>
                    </div>

                    {{-- Skills --}}
                    <div class="mb-5" x-show="student.skills && student.skills.length > 0">
                        <p class="text-xs font-semibold text-gray-500 uppercase mb-2">Skills</p>
                        <div class="flex flex-wrap gap-2">
                            <template x-for="skill in student.skills" :key="skill">
                                <span class="px-2 py-1 bg-indigo-50 text-indigo-700 text-xs font-medium rounded-full" x-text="skill"></span>
                            </template>
                        </div>
                    </div>

                    {{-- Actions --}}
                    <div class="flex gap-2 pt-4 border-t border-gray-100">
                        <button class="flex-1 px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 font-medium text-sm transition-colors">
                            Connect
                        </button>
                        <template x-if="student.social?.linkedin">
                            <a :href="student.social.linkedin" class="p-2 border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors">
                                <svg class="w-5 h-5 text-gray-600" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/>
                                </svg>
                            </a>
                        </template>
                        <template x-if="student.social?.twitter">
                            <a :href="student.social.twitter" class="p-2 border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors">
                                <svg class="w-5 h-5 text-gray-600" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                                </svg>
                            </a>
                        </template>
                    </div>
                </article>
            </template>
        </section>

        {{-- Bettermode Badge --}}
        <div class="flex items-center justify-center gap-2 text-gray-500 text-sm py-8">
            <svg class="w-5 h-5 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
            </svg>
            Made in Bettermode
        </div>
    </main>
</x-layouts.app>
