@extends('layouts.master')

@section('title', 'Contact Us')

@section('content')
<div class="py-12 md:py-20 max-w-6xl mx-auto px-4">
    <div class="text-center mb-12 space-y-4">
        <span class="text-sm font-bold tracking-widest text-blue-600 uppercase">Get in Touch</span>
        <h1 class="text-4xl md:text-5xl font-extrabold text-gray-900 tracking-tight">
            We'd love to hear from you
        </h1>
        <p class="text-xl text-gray-600 max-w-2xl mx-auto">
            Whether you have a question about our products, shipping, or just want to say hello, our team is ready to answer all your questions.
        </p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-24">
        <!-- Contact Context -->
        <div class="space-y-10 mt-2">
            <div class="bg-white p-8 rounded-3xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow group">
                <div class="w-14 h-14 bg-blue-50 rounded-2xl flex items-center justify-center text-blue-600 mb-6 group-hover:scale-110 transition-transform">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Email Us</h3>
                <p class="text-gray-600 mb-4">Our friendly team is here to help.</p>
                <a href="mailto:hello@lacommerce.com" class="text-lg font-medium text-blue-600 hover:text-blue-800 transition-colors">hello@lacommerce.com</a>
            </div>

            <div class="bg-white p-8 rounded-3xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow group">
                <div class="w-14 h-14 bg-blue-50 rounded-2xl flex items-center justify-center text-blue-600 mb-6 group-hover:scale-110 transition-transform">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Visit Our Studio</h3>
                <p class="text-gray-600 mb-4">Come say hello at our headquarters.</p>
                <p class="text-lg font-medium text-gray-900">100 Innovation Drive<br>San Francisco, CA 94103</p>
            </div>
        </div>

        <!-- Contact Form -->
        <div class="bg-white p-10 rounded-3xl shadow-xl border border-gray-100 relative overflow-hidden">
            <div class="absolute top-0 left-0 w-full h-2 bg-linear-to-r from-blue-600 to-indigo-500"></div>
            <h3 class="text-2xl font-bold text-gray-900 mb-8 mt-2">Send us a message</h3>
            <form action="#" method="POST" class="space-y-6">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="first_name" class="block text-sm font-medium text-gray-700 mb-2">First name</label>
                        <input type="text" id="first_name" name="first_name" class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all outline-none text-gray-900 placeholder-gray-400" placeholder="Jane">
                    </div>
                    <div>
                        <label for="last_name" class="block text-sm font-medium text-gray-700 mb-2">Last name</label>
                        <input type="text" id="last_name" name="last_name" class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all outline-none text-gray-900 placeholder-gray-400" placeholder="Doe">
                    </div>
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email address</label>
                    <input type="email" id="email" name="email" class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all outline-none text-gray-900 placeholder-gray-400" placeholder="jane@example.com">
                </div>

                <div>
                    <label for="subject" class="block text-sm font-medium text-gray-700 mb-2">Subject</label>
                    <select id="subject" name="subject" class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all outline-none text-gray-900 cursor-pointer appearance-none">
                        <option value="general">General Inquiry</option>
                        <option value="support">Customer Support</option>
                        <option value="press">Press & Media</option>
                        <option value="partnerships">Partnerships</option>
                    </select>
                </div>

                <div>
                    <label for="message" class="block text-sm font-medium text-gray-700 mb-2">Message</label>
                    <textarea id="message" name="message" rows="5" class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all outline-none resize-none text-gray-900 placeholder-gray-400" placeholder="How can we help?"></textarea>
                </div>

                <button type="submit" class="w-full bg-gray-900 text-white font-semibold py-4 px-6 rounded-xl hover:bg-gray-800 transition-all shadow-lg hover:shadow-xl hover:-translate-y-0.5 mt-2">
                    Send Message
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
