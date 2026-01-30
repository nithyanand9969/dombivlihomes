<?php
// ================== ERROR REPORTING (DEV ONLY) ==================
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// ================== DB CONNECTION ==================
require_once __DIR__ . '/../config/database.php';
$conn = getDBConnection();

// ================== FETCH SERVICE AREAS ==================
$areas_query = "
    SELECT area_name, pincode, zone 
    FROM service_areas 
    WHERE is_active = 1 
    ORDER BY zone, area_name
";
$areas_result = $conn->query($areas_query);
?>

<?php include_once '../includes/header.php'; ?>

<main class="min-h-screen bg-gradient-to-b from-gray-50 to-white">

<!-- ================== HERO SECTION ================== -->
<section class="bg-gradient-to-r from-blue-600 to-green-500 text-white py-16">
    <div class="max-w-7xl mx-auto px-6 text-center">
        <h1 class="text-4xl md:text-5xl font-bold mb-4">
            Service Areas in Dombivli
        </h1>
        <p class="text-lg md:text-xl opacity-90">
            Trusted home services available across Dombivli East & West
        </p>
    </div>
</section>

<!-- ================== AREAS SECTION ================== -->
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold mb-4 gradient-text">
                Areas We Serve
            </h2>
            <p class="text-gray-600 max-w-3xl mx-auto">
                Our verified professionals are available in the following locations
                for electrician, plumber, carpenter, painter & maintenance services.
            </p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">

            <?php if ($areas_result && $areas_result->num_rows > 0): ?>
                <?php while ($area = $areas_result->fetch_assoc()): ?>

                    <div class="bg-gray-50 rounded-2xl p-6 shadow hover:shadow-lg transition border border-gray-100">

                        <div class="w-12 h-12 rounded-full bg-green-100 flex items-center justify-center mb-4">
                            <i class="fas fa-map-marker-alt text-green-600 text-xl"></i>
                        </div>

                        <h3 class="text-lg font-bold text-gray-800 mb-1">
                            <?= htmlspecialchars($area['area_name']) ?>
                        </h3>

                        <p class="text-sm text-gray-500 mb-2">
                            Pincode: <?= htmlspecialchars($area['pincode']) ?>
                        </p>

                        <?php if (!empty($area['zone'])): ?>
                            <span class="inline-block text-xs bg-blue-100 text-blue-700 px-3 py-1 rounded-full">
                                <?= htmlspecialchars($area['zone']) ?>
                            </span>
                        <?php endif; ?>

                    </div>

                <?php endwhile; ?>
            <?php else: ?>
                <!-- EMPTY STATE -->
                <div class="col-span-full text-center py-16">
                    <i class="fas fa-map text-5xl text-gray-300 mb-4"></i>
                    <p class="text-gray-500 text-lg">
                        Service areas will be updated soon.
                    </p>
                </div>
            <?php endif; ?>

        </div>
    </div>
</section>

<!-- ================== CTA ================== -->
<section class="py-16 bg-gray-50 border-t">
    <div class="max-w-6xl mx-auto px-6 text-center">
        <h2 class="text-3xl font-bold mb-4 text-gray-800">
            Need a Home Service in Your Area?
        </h2>
        <p class="text-gray-600 mb-8">
            Book trusted professionals with fast response and affordable pricing.
        </p>

        <div class="flex justify-center gap-4 flex-wrap">
            <a href="/data/services.php"
               class="bg-blue-600 text-white px-8 py-3 rounded-full font-semibold hover:bg-blue-700 transition">
                View Services
            </a>
            <a href="tel:+919999999999"
               class="bg-green-600 text-white px-8 py-3 rounded-full font-semibold hover:bg-green-700 transition">
                Call Now
            </a>
        </div>
    </div>
</section>

</main>

<?php include_once '../includes/footer.php'; ?>
