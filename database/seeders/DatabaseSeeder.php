<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seed Admin User
        \App\Models\User::firstOrCreate(
            ['email' => 'admin@btautomation.lk'],
            [
                'name' => 'BT Admin',
                'password' => bcrypt('Admin@BT2026!'),
            ]
        );

        // Seed Categories
        $plc = \App\Models\Category::create([
            'name' => 'PLCs & Controllers',
            'slug' => 'plcs-controllers',
            'description' => 'Industrial programmable logic controllers (PLCs), HMIs, and expansion modules.',
            'icon' => 'cpu'
        ]);

        $sensor = \App\Models\Category::create([
            'name' => 'Industrial Sensors',
            'slug' => 'industrial-sensors',
            'description' => 'Proximity sensors, photoelectric eyes, limit switches, and temperature probes.',
            'icon' => 'radio'
        ]);

        $solar = \App\Models\Category::create([
            'name' => 'Solar Power Solutions',
            'slug' => 'solar-solutions',
            'description' => 'High-efficiency solar panels, hybrid inverters, and mounting accessories.',
            'icon' => 'sun'
        ]);

        $inverter = \App\Models\Category::create([
            'name' => 'Inverters & Motor Drives',
            'slug' => 'inverters-drives',
            'description' => 'Variable Frequency Drives (VFDs), soft starters, and AC motor speed controllers.',
            'icon' => 'activity'
        ]);

        $robotics = \App\Models\Category::create([
            'name' => 'Robotics & DIY Kits',
            'slug' => 'robotics-diy',
            'description' => 'Robotic arms, development boards (Arduino, Raspberry Pi), and component modules.',
            'icon' => 'tool'
        ]);

        // Seed Products
        \App\Models\Product::create([
            'category_id' => $plc->id,
            'name' => 'Siemens SIMATIC S7-1200 PLC',
            'slug' => 'siemens-s7-1200-plc',
            'description' => 'The Siemens SIMATIC S7-1200 controller is modular and compact, perfectly suited for a wide range of automation applications. Integrated PROFINET interface, high-speed counters, and analog inputs.',
            'price' => 68500.00,
            'is_featured' => true,
            'image' => 's7-1200.jpg',
            'specifications' => [
                'Manufacturer' => 'Siemens',
                'Model' => 'CPU 1214C DC/DC/Relay',
                'Digital Inputs' => '14 (24V DC)',
                'Digital Outputs' => '10 (Relay, 2A)',
                'Analog Inputs' => '2 (0-10V DC)',
                'Memory' => '125 KB user memory',
                'Communication' => 'PROFINET (Ethernet) RJ45 port',
                'Power Supply' => '20.4 - 28.8 V DC'
            ]
        ]);

        \App\Models\Product::create([
            'category_id' => $plc->id,
            'name' => 'Weintek 7-inch HMI Touch Screen',
            'slug' => 'weintek-7-inch-hmi',
            'description' => 'High-definition industrial touchscreen display with quad-core processor and dual Ethernet ports. Supports major PLC protocols including Siemens, Mitsubishi, and Modbus TCP/RTU.',
            'price' => 48000.00,
            'is_featured' => false,
            'image' => 'weintek-hmi.jpg',
            'specifications' => [
                'Manufacturer' => 'Weintek',
                'Screen Size' => '7 inches (800x480 TFT LCD)',
                'Processor' => 'Quad-core 32-bit RISC',
                'Memory' => '4 GB Flash, 1 GB RAM',
                'Ports' => 'Ethernet, USB 2.0 Client, RS-485, RS-232',
                'Software' => 'EasyBuilder Pro (Free)'
            ]
        ]);

        \App\Models\Product::create([
            'category_id' => $sensor->id,
            'name' => 'Omron E2E Inductive Proximity Sensor',
            'slug' => 'omron-e2e-proximity-sensor',
            'description' => 'World-leading standard proximity sensor for metal object detection. Superior water resistance, oil resistance, and heat dissipation.',
            'price' => 6500.00,
            'is_featured' => true,
            'image' => 'omron-proximity.jpg',
            'specifications' => [
                'Manufacturer' => 'Omron',
                'Sensing Distance' => '5 mm ±10%',
                'Housing' => 'M12 Threaded Brass Nickel-plated',
                'Output Type' => 'PNP Normally Open (NO)',
                'Connection' => 'Pre-wired (2-meter cable)',
                'Operating Voltage' => '10 - 30 V DC'
            ]
        ]);

        \App\Models\Product::create([
            'category_id' => $sensor->id,
            'name' => 'Autonics Photoelectric Sensor (Retro-reflective)',
            'slug' => 'autonics-photoelectric-sensor',
            'description' => 'Long-distance detection photoelectric sensor with built-in sensitivity adjustment and polarization filter to prevent false detections from shiny surfaces.',
            'price' => 9500.00,
            'is_featured' => false,
            'image' => 'autonics-photo.jpg',
            'specifications' => [
                'Manufacturer' => 'Autonics',
                'Sensing Range' => '0.1 - 3 meters (with reflector)',
                'Light Source' => 'Red LED (660nm)',
                'Output' => 'Relay Contact output (SPDT)',
                'Power Supply' => '24 - 240 V AC / 12 - 240 V DC'
            ]
        ]);

        \App\Models\Product::create([
            'category_id' => $solar->id,
            'name' => 'Jinko Tiger Neo 550W Solar Panel',
            'slug' => 'jinko-tiger-neo-550w',
            'description' => 'Jinko N-Type Monocrystalline solar panel using SMBB technology for better light trapping and current collection. High power output and lower degradation.',
            'price' => 42000.00,
            'is_featured' => true,
            'image' => 'jinko-550w.jpg',
            'specifications' => [
                'Manufacturer' => 'Jinko Solar',
                'Max Power (Pmax)' => '550 Watts',
                'Cell Type' => 'N-type Monocrystalline',
                'Module Efficiency' => '21.28%',
                'Open Circuit Voltage (Voc)' => '50.88 V',
                'Short Circuit Current (Isc)' => '13.93 A',
                'Dimensions' => '2278 x 1134 x 35 mm',
                'Weight' => '28 kg'
            ]
        ]);

        \App\Models\Product::create([
            'category_id' => $inverter->id,
            'name' => 'Delta MS300 Series VFD (2.2kW)',
            'slug' => 'delta-ms300-vfd-2-2kw',
            'description' => 'Compact vector control drive that supports both IM and PM motor control. Built-in PLC functions, safe torque off (STO), and USB port for fast configurations.',
            'price' => 45000.00,
            'is_featured' => true,
            'image' => 'delta-vfd.jpg',
            'specifications' => [
                'Manufacturer' => 'Delta Electronics',
                'Power Rating' => '2.2 kW (3 Horsepower)',
                'Input Voltage' => '1-Phase 200 - 240 V AC',
                'Output Frequency' => '0.0 - 599.0 Hz',
                'Communication' => 'MODBUS RTU (RS-485)',
                'Protection Level' => 'IP20'
            ]
        ]);

        \App\Models\Product::create([
            'category_id' => $robotics->id,
            'name' => '6-DOF Metal Robotic Arm Kit',
            'slug' => '6-dof-robotic-arm-kit',
            'description' => 'Full metal 6 Degrees of Freedom robotic claw/arm structure with 6 high-torque metal gear servos. Perfect for automation students and hobbyists.',
            'price' => 18500.00,
            'is_featured' => false,
            'image' => 'robot-arm.jpg',
            'specifications' => [
                'Material' => 'Hard aluminum alloy structure',
                'Degrees of Freedom' => '6 DOF',
                'Servos' => '4x MG996R, 2x SG90 servos',
                'Max Reach' => '35 cm',
                'Payload Capacity' => '150 g',
                'Compatibility' => 'Arduino, Raspberry Pi, ESP32'
            ]
        ]);

        // Seed Testimonials
        \App\Models\Testimonial::create([
            'name' => 'M. Wijesinghe',
            'role' => 'Plant Manager',
            'company' => 'Lanka Foods',
            'rating' => 5,
            'content' => 'We had an emergency shutdown in our packaging line due to a faulty CPU. BT Industrial not only supplied the Siemens S7-1200 PLC replacement instantly but also helped our team configure the expansion modules online. Exceptional service!',
            'is_approved' => true
        ]);

        \App\Models\Testimonial::create([
            'name' => 'S. K. Perera',
            'role' => 'Electrical Engineer',
            'company' => 'Apex Textiles',
            'rating' => 5,
            'content' => 'Finding genuine industrial automation sensors locally in Sri Lanka is always challenging. Their range of Omron proximity sensors is top-notch. Fast delivery and they provided full technical datasheets before ordering.',
            'is_approved' => true
        ]);

        \App\Models\Testimonial::create([
            'name' => 'K. Dharmasiri',
            'role' => 'Homeowner',
            'company' => 'Horana',
            'rating' => 5,
            'content' => 'I bought a hybrid solar inverter setup for my home from BT Industrial. The guidance they gave me on scaling my battery array was extremely helpful. My electricity bill is down by 80% now. Highly recommended!',
            'is_approved' => true
        ]);
    }
}
