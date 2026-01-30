<?php include_once 'includes/header.php'; ?>

<main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">

    <!-- ===== PAGE HEADER ===== -->
    <div class="text-center mb-12">
        <h1 class="text-4xl md:text-5xl font-bold gradient-text mb-4">
            Contact Us
        </h1>
        <p class="text-gray-600 max-w-2xl mx-auto">
            Have a question or need a service?  
            Get in touch with us and our team will assist you shortly.
        </p>
    </div>

    <!-- ===== CONTACT GRID ===== -->
    <div class="grid md:grid-cols-2 gap-10">

        <!-- ===== CONTACT DETAILS ===== -->
        <div class="bg-white rounded-2xl shadow-lg p-8">

            <h2 class="text-2xl font-bold mb-6 text-gray-800">
                Get in Touch
            </h2>

            <div class="space-y-6 text-gray-700">

                <div class="flex items-start gap-4">
                    <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                        <i class="fas fa-phone-alt text-blue-700"></i>
                    </div>
                    <div>
                        <p class="font-semibold">Phone</p>
                        <a href="tel:<?= PHONE ?>" class="text-blue-700 hover:underline">
                            <?= PHONE ?>
                        </a>
                    </div>
                </div>

                <div class="flex items-start gap-4">
                    <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                        <i class="fas fa-envelope text-green-700"></i>
                    </div>
                    <div>
                        <p class="font-semibold">Email</p>
                        <a href="mailto:<?= EMAIL ?>" class="text-blue-700 hover:underline">
                            <?= EMAIL ?>
                        </a>
                    </div>
                </div>

                <div class="flex items-start gap-4">
                    <div class="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center">
                        <i class="fas fa-map-marker-alt text-orange-700"></i>
                    </div>
                    <div>
                        <p class="font-semibold">Service Area</p>
                        <p class="text-gray-600">
                            Dombivli East & West<br>
                            Maharashtra, India
                        </p>
                    </div>
                </div>

            </div>

            <!-- Call Button -->
            <a href="tel:<?= PHONE ?>"
               class="mt-8 inline-flex items-center gap-3 bg-blue-700 text-white px-6 py-3 rounded-full font-semibold hover:bg-blue-800 transition">
                <i class="fas fa-phone"></i>
                Call Now
            </a>

        </div>

        <!-- ===== CONTACT FORM ===== -->
        <div class="bg-white rounded-2xl shadow-lg p-8">

            <h2 class="text-2xl font-bold mb-6 text-gray-800">
                Send Us a Message
            </h2>

            <form action="contact-submit.php" method="POST" class="space-y-5">

                <div>
                    <label class="block text-sm font-semibold mb-1">Full Name</label>
                    <input type="text" name="name" required
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
                </div>

                <div>
                    <label class="block text-sm font-semibold mb-1">Phone Number</label>
                    <input type="tel" name="phone" required
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
                </div>

                <div>
                    <label class="block text-sm font-semibold mb-1">Email Address</label>
                    <input type="email" name="email"
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
                </div>

                <div>
                    <label class="block text-sm font-semibold mb-1">Message</label>
                    <textarea name="message" rows="4" required
                              class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"></textarea>
                </div>

                <button type="submit"
                        class="w-full btn-gradient py-3 rounded-lg font-semibold text-white">
                    Send Message
                </button>

            </form>

        </div>
    </div>

</main>

<?php include_once 'includes/footer.php'; ?>
