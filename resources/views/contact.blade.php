@extends('layouts.app')

@section('title', 'Contact Us | BT Industrial Automation')

@section('content')
<div class="py-12 bg-slate-950">
    <div class="container mx-auto px-4">
        
        <div class="text-center mb-16">
            <h1 class="text-3xl md:text-5xl font-serif font-bold text-white mb-4">Contact Our Engineering Team</h1>
            <p class="text-slate-400 max-w-md mx-auto">Get in touch with BT Industrial Automation for orders, custom solutions, or general technical inquiries.</p>
            <div class="w-16 h-1 bg-brand-gold mx-auto mt-4 rounded"></div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-start">
            
            <!-- Left Side: Contact Information & Operating Hours -->
            <div class="space-y-8">
                
                <!-- Contact Details Card -->
                <div class="bg-brand-blue-dark/20 border border-brand-blue-light/20 p-8 rounded-2xl space-y-6">
                    <h3 class="text-xl font-serif font-bold text-white border-b border-brand-blue-light/20 pb-3 flex items-center gap-2">
                        <svg class="w-5 h-5 text-brand-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        Business Information
                    </h3>
                    
                    <div class="space-y-4">
                        <div class="flex items-start gap-4">
                            <div class="w-10 h-10 bg-slate-900 border border-brand-blue-light rounded-lg flex items-center justify-center text-brand-gold shrink-0">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            </div>
                            <div>
                                <h4 class="text-white text-sm font-semibold">Office Address</h4>
                                <p class="text-slate-400 text-sm mt-1">67, 23rd lane, Dikhenapura Horana, Sri Lanka.</p>
                            </div>
                        </div>

                        <div class="flex items-start gap-4">
                            <div class="w-10 h-10 bg-slate-900 border border-brand-blue-light rounded-lg flex items-center justify-center text-brand-gold shrink-0">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.94.725l.548 2.2a1 1 0 01-.321.988l-1.305.98a10.582 10.582 0 004.872 4.872l.98-1.305a1 1 0 01.988-.321l2.2.548a1 1 0 01.725.94V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                            </div>
                            <div>
                                <h4 class="text-white text-sm font-semibold">Phone Lines</h4>
                                <p class="text-slate-400 text-sm mt-1">Mobile: +94 70 385 0140</p>
                            </div>
                        </div>

                        <div class="flex items-start gap-4">
                            <div class="w-10 h-10 bg-slate-900 border border-brand-blue-light rounded-lg flex items-center justify-center text-brand-gold shrink-0">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                            </div>
                            <div>
                                <h4 class="text-white text-sm font-semibold">Email Correspondence</h4>
                                <p class="text-slate-400 text-sm mt-1">buddikatharindujp@gmail.com</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Operating Hours Card -->
                <div class="bg-glass-card hover-glass-card p-8 rounded-2xl space-y-4">
                    <h3 class="text-xl font-serif font-bold text-white border-b border-brand-blue-light/20 pb-3 flex items-center gap-2">
                        <svg class="w-5 h-5 text-brand-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        Business Hours
                    </h3>
                    <div class="text-sm text-slate-400 leading-relaxed">
                        <p class="mb-2">We are open daily for component inquiries, consultation, and engineering support.</p>
                        <div class="flex justify-between items-center bg-slate-950/40 p-3 rounded-lg border border-brand-blue-light/10 mt-3">
                            <span class="font-semibold text-white">Poya Days</span>
                            <span class="text-rose-500 font-bold uppercase tracking-wider text-xs">Closed</span>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Right Side: Google Maps Frame & Contact Form -->
            <div class="space-y-8">
                
                <!-- Google Maps Frame -->
                <div class="border border-brand-blue-light/20 rounded-2xl overflow-hidden shadow-xl aspect-video relative">
                    <!-- Responsive embedded iframe pointing to 67, 23rd lane, Dikhenapura, Horana -->
                    <iframe 
                        src="https://maps.google.com/maps?q=67,%2023rd%20lane,%20Dikhenapura,%20Horana,%20Sri%20Lanka&t=&z=16&ie=UTF8&iwloc=&output=embed" 
                        class="absolute inset-0 w-full h-full border-0" 
                        allowfullscreen="" 
                        loading="lazy" 
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>

                <!-- Contact Message Form -->
                <div class="bg-brand-blue-dark/20 border border-brand-blue-light/20 p-8 rounded-2xl">
                    <h3 class="text-xl font-serif font-bold text-white mb-6 border-b border-brand-blue-light/20 pb-3">Send a Message</h3>
                    
                    @if(session('success'))
                        <div class="bg-emerald-950/40 border border-emerald-500/40 text-emerald-300 px-6 py-4 rounded-xl text-sm mb-6 text-center animate-pulse" role="alert">
                            <span class="font-semibold">{{ session('success') }}</span>
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="bg-rose-950/40 border border-rose-500/40 text-rose-300 px-6 py-4 rounded-xl text-sm mb-6">
                            <ul class="list-disc pl-5 space-y-1">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('contact.store') }}" method="POST" class="space-y-4">
                        @csrf
                        <div>
                            <label for="name" class="block text-xs font-semibold uppercase tracking-wider text-slate-400 mb-2">Full Name *</label>
                            <input type="text" id="name" name="name" placeholder="John Doe" required value="{{ old('name') }}"
                                   class="w-full bg-slate-900 border border-brand-blue-light/50 rounded-lg px-4 py-2.5 text-sm text-slate-100 placeholder-slate-500 focus:outline-none focus:border-brand-gold focus:ring-1 focus:ring-brand-gold transition-colors duration-300">
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label for="email" class="block text-xs font-semibold uppercase tracking-wider text-slate-400 mb-2">Email Address *</label>
                                <input type="email" id="email" name="email" placeholder="john@example.com" required value="{{ old('email') }}"
                                       class="w-full bg-slate-900 border border-brand-blue-light/50 rounded-lg px-4 py-2.5 text-sm text-slate-100 placeholder-slate-500 focus:outline-none focus:border-brand-gold focus:ring-1 focus:ring-brand-gold transition-colors duration-300">
                            </div>
                            <div>
                                <label for="phone" class="block text-xs font-semibold uppercase tracking-wider text-slate-400 mb-2">Phone Number</label>
                                <input type="tel" id="phone" name="phone" placeholder="+94 70 385 0140" value="{{ old('phone') }}"
                                       class="w-full bg-slate-900 border border-brand-blue-light/50 rounded-lg px-4 py-2.5 text-sm text-slate-100 placeholder-slate-500 focus:outline-none focus:border-brand-gold focus:ring-1 focus:ring-brand-gold transition-colors duration-300">
                            </div>
                        </div>

                        <div>
                            <label for="message" class="block text-xs font-semibold uppercase tracking-wider text-slate-400 mb-2">Message Body *</label>
                            <textarea id="message" name="message" rows="4" placeholder="How can our engineering team help you?" required
                                      class="w-full bg-slate-900 border border-brand-blue-light/50 rounded-lg px-4 py-2.5 text-sm text-slate-100 placeholder-slate-500 focus:outline-none focus:border-brand-gold focus:ring-1 focus:ring-brand-gold transition-colors duration-300">{{ old('message') }}</textarea>
                        </div>

                        <button type="submit" 
                                class="w-full py-3 bg-brand-gold hover:bg-brand-gold-dark text-slate-950 font-bold rounded-xl text-sm transition-all duration-300 transform hover:-translate-y-0.5 shadow-lg shadow-brand-gold/15 cursor-pointer">
                            Submit Inquiry
                        </button>
                    </form>
                </div>

            </div>

        </div>

    </div>
</div>
@endsection
