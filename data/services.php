<?php
// ================== ERROR REPORTING (DEV ONLY) ==================
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// ================== DB CONNECTION ==================
require_once __DIR__ . '/../config/database.php';
$conn = getDBConnection();

// ================== FETCH SERVICES ==================
$services_query = "SELECT * FROM services WHERE is_active = 1 ORDER BY name";
$services_result = $conn->query($services_query);

// ================== FETCH SERVICE AREAS ==================
$areas_query = "SELECT * FROM service_areas WHERE is_active = 1 ORDER BY area_name";
$areas_result = $conn->query($areas_query);

// ================== FETCH WORKER COUNTS ==================
$workers_count_query = "
    SELECT service_id, COUNT(*) as worker_count
    FROM workers
    WHERE is_available = 1
    GROUP BY service_id
";
$workers_count_result = $conn->query($workers_count_query);

$workers_count = [];
if ($workers_count_result) {
    while ($row = $workers_count_result->fetch_assoc()) {
        $workers_count[$row['service_id']] = $row['worker_count'];
    }
}

// ================== HELPER FUNCTION ==================
if (!function_exists('getDefaultIcon')) {
    function getDefaultIcon($category) {
        $icons = [
            'electrician'  => 'fas fa-bolt',
            'plumber'      => 'fas fa-faucet',
            'carpenter'    => 'fas fa-hammer',
            'painter'      => 'fas fa-paint-roller',
            'maintenance'  => 'fas fa-tools',
            'repair'       => 'fas fa-wrench',
            'installation' => 'fas fa-cogs',
            'general'      => 'fas fa-concierge-bell'
        ];
        return $icons[$category] ?? 'fas fa-concierge-bell';
    }
}
?>

<?php include_once '../includes/header.php'; ?>

<main class="min-h-screen bg-gradient-to-b from-gray-50 to-white">

<!-- ================== SERVICES SECTION ================== -->
<section id="services" class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold mb-4 gradient-text">
                Our Professional Services
            </h2>
            <p class="text-gray-600 max-w-3xl mx-auto">
                Verified professionals for every home service need.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

            <?php if ($services_result && $services_result->num_rows > 0): ?>
                <?php while ($service = $services_result->fetch_assoc()): ?>
                    <?php
                        $worker_count = $workers_count[$service['id']] ?? 0;
                        $icon_class = !empty($service['icon'])
                            ? $service['icon']
                            : getDefaultIcon($service['category']);
                    ?>

                    <div class="service-card rounded-2xl p-6 shadow-lg border border-gray-100"
                         data-category="<?= htmlspecialchars($service['category'] ?? 'general') ?>">

                        <div class="flex items-start justify-between mb-4">
                            <div class="w-14 h-14 bg-blue-600 rounded-xl flex items-center justify-center">
                                <i class="<?= $icon_class ?> text-white text-2xl"></i>
                            </div>
                            <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-3 py-1 rounded-full">
                                <?= $worker_count ?> Available
                            </span>
                        </div>

                        <h3 class="text-xl font-bold mb-2">
                            <?= htmlspecialchars($service['name']) ?>
                        </h3>

                        <p class="text-gray-600 mb-4">
                            <?= htmlspecialchars($service['description']) ?>
                        </p>

                        <div class="flex items-center text-sm text-gray-500 mb-4">
                            <i class="fas fa-rupee-sign mr-2"></i>
                            <?= htmlspecialchars($service['price_range']) ?>
                        </div>

                        <a href="service-detail.php?id=<?= $service['id'] ?>"
                           class="block bg-blue-600 text-white text-center py-3 rounded-lg font-semibold hover:bg-blue-700">
                            Book Now
                        </a>
                    </div>
                <?php endwhile; ?>

            <?php else: ?>
                <!-- SAFE EMPTY STATE (NO SELF INCLUDE) -->
                <div class="col-span-full text-center py-16">
                    <i class="fas fa-tools text-5xl text-gray-300 mb-4"></i>
                    <p class="text-gray-500 text-lg">
                        No services available right now.
                    </p>
                </div>
            <?php endif; ?>

        </div>
    </div>
</section>

<!-- ================== SERVICE AREAS ================== -->
<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold mb-4 gradient-text">
                We Serve Across Dombivli
            </h2>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-5 gap-4">

            <?php if ($areas_result && $areas_result->num_rows > 0): ?>
                <?php while ($area = $areas_result->fetch_assoc()): ?>
                    <div class="bg-white rounded-xl p-4 text-center shadow border">
                        <i class="fas fa-map-marker-alt text-green-600 text-xl mb-2"></i>
                        <h4 class="font-semibold">
                            <?= htmlspecialchars($area['area_name']) ?>
                        </h4>
                        <p class="text-sm text-gray-500">
                            <?= htmlspecialchars($area['pincode']) ?>
                        </p>
                    </div>
                <?php endwhile; ?>

            <?php else: ?>
                <div class="col-span-full text-center text-gray-500">
                    Service areas will be updated soon.
                </div>
            <?php endif; ?>

        </div>
    </div>
</section>

</main>

<?php include_once '../includes/footer.php'; ?>
