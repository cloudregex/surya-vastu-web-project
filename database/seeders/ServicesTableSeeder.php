<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [

            // ✅ Core Vastu Services
            [
                'service_name' => 'Residential Vastu',
                'service_slug' => 'residential-vastu',
                'service_image' => 'default/service.jpg',
                'service_description' => '<p>Residential Vastu is the foundation for a happy and harmonious living space. Our expert Vastu consultants analyze your home structure, directions, room placements, entrance, kitchen, bedroom, and washrooms according to the ancient principles of Vastu Shastra. By applying these principles, we ensure that positive energy flows throughout your house, bringing prosperity, peace, and health to your family. Our consultation includes analyzing the main entrance and energy direction, room placement and furniture positioning, kitchen and washroom placement guidance, and remedies for any existing Vastu defects. With our consultation, you can turn your home into a sanctuary of happiness and prosperity.</p>',
            ],
            [
                'service_name' => 'Commercial Vastu',
                'service_slug' => 'commercial-vastu',
                'service_image' => 'default/service.jpg',
                'service_description' => '<p>Boost your business growth with Commercial Vastu Consultation. Every business runs on energy flow, and a perfect energy balance in your commercial space ensures increased productivity, higher revenue, and satisfied customers. We provide Vastu solutions for shops, retail stores, offices, corporate spaces, showrooms, display centers, restaurants, and cafes. Our team carefully analyzes the location, sitting arrangement, entrance, and cash counter placement as per Vastu to ensure success in your business. By following our guidance, you can create a balanced and prosperous workspace that supports your professional goals.</p>',
            ],
            [
                'service_name' => 'Industrial Vastu',
                'service_slug' => 'industrial-vastu',
                'service_image' => 'default/service.jpg',
                'service_description' => '<p>Our Industrial Vastu service is designed for large-scale factories, warehouses, and production units to maximize productivity and reduce operational issues. We focus on the placement of machinery and equipment, the direction of raw materials and finished goods, employee workstations and office spaces, and entry and exit points for positive energy flow. By following Vastu principles in your industry, you can ensure smooth operations, higher productivity, and rapid business growth. Our remedies are practical and easy to implement, ensuring minimal disruption to your operations.</p>',
            ],
            [
                'service_name' => 'Color Therapy',
                'service_slug' => 'color-therapy',
                'service_image' => 'default/service.jpg',
                'service_description' => '<p>Colors play a vital role in influencing human emotions, thoughts, and behavior. Our Color Therapy service uses the power of colors to balance energy in your home, office, or commercial space. We analyze the existing color schemes in your space and recommend color changes in specific rooms or areas to align with the five elements of Vastu (Earth, Water, Fire, Air, Space). By choosing the right colors, you can enhance mental peace, productivity, and overall well-being. Our solutions are tailored to your specific needs, ensuring a positive and harmonious environment.</p>',
            ],
            [
                'service_name' => 'Mapping of Property',
                'service_slug' => 'mapping-of-property',
                'service_image' => 'default/service.jpg',
                'service_description' => '<p>Property Mapping involves aligning your property\'s layout, dimensions, and energy flow according to Vastu Shastra principles. This is a must-have service before starting any construction work. We analyze the plot dimensions and directions, provide ideal placement for rooms, doors, and furniture, and ensure natural light and air circulation as per Vastu. By mapping out the energy flow for positive vibes, we ensure that your property layout attracts maximum positive energy and prosperity. Our solutions are practical and easy to implement, ensuring a harmonious and successful project.</p>',
            ],
            [
                'service_name' => 'Vastu Parikshan (Vastu Inspection)',
                'service_slug' => 'vastu-parikshan-vastu-inspection',
                'service_image' => 'default/service.jpg',
                'service_description' => '<p>Vastu Parikshan (Vastu Inspection) is a complete analysis of your property\'s energy flow, directions, room placements, and Vastu alignment. Whether it is your home, office, shop, or factory, this service is designed to identify existing Vastu defects and provide practical solutions. We analyze the main entrance and energy flow, identify Vastu Doshas (defects) in rooms, kitchen, toilets, and staircase, and check the plot direction, slope, and overall energy balance. With our expert inspection, you can eliminate negative energy, promote peace, and increase prosperity in your space.</p>',
            ],
            [
                'service_name' => 'Vastu Arakhada (Vastu Planning)',
                'service_slug' => 'vastu-arakhada-vastu-planning',
                'service_image' => 'default/service.jpg',
                'service_description' => '<p>Vastu Arakhada (Vastu Planning) is a professional service where we design and plan your property as per Vastu Shastra. This service is ideal for people who are planning new constructions, renovations, or property development. We focus on designing room placement as per Vastu, planning the entrance, kitchen, and toilet locations, and ensuring natural air, sunlight, and positive energy balance. By following our Vastu Arakhada service, you can ensure a smooth energy flow, financial growth, and mental peace in your new construction.</p>',
            ],
            [
                'service_name' => 'Vastu Dosh Nivaran (Vastu Defect Removal)',
                'service_slug' => 'vastu-dosh-nivaran-vastu-defect-removal',
                'service_image' => 'default/service.jpg',
                'service_description' => '<p>Vastu Dosh Nivaran (Vastu Defect Removal) is a powerful solution to eliminate negative energy from your home, office, shop, or factory. Many properties face financial losses, health issues, and conflicts due to improper Vastu. This service helps in removing such defects without any major reconstruction. We identify Vastu defects affecting your property, suggest effective remedies without demolition, and recommend the placement of Vastu Yantras and energy boosters. By repositioning furniture or objects to balance energy, we help you turn negative energy into positive vibrations, ensuring prosperity, health, and peace in your space.</p>',
            ],
            [
                'service_name' => 'Rangrangoti (Color Decoration as per Vastu)',
                'service_slug' => 'rangrangoti-color-decoration-vastu',
                'service_image' => 'default/service.jpg',
                'service_description' => '<p>Rangrangoti (Color Decoration as per Vastu) focuses on selecting the perfect color combination for walls, furniture, and decor as per Vastu principles. Colors have a direct impact on energy flow and human emotions. Choosing the wrong color can attract negative energy, while choosing the right color can boost prosperity and happiness. We analyze the color of your rooms, furniture, and decor, recommend color combinations that promote positive energy, and ensure color balancing based on the five elements (Earth, Water, Fire, Air, Space). With our expert guidance, you can turn your home or office into a positive energy hub.</p>',
            ],
            [
                'service_name' => 'Antargat Sajavat (Interior Decoration as per Vastu)',
                'service_slug' => 'antargat-sajavat-interior-decoration-vastu',
                'service_image' => 'default/service.jpg',
                'service_description' => '<p>Antargat Sajavat (Interior Decoration as per Vastu) is a service that transforms your interior space according to Vastu principles. Our goal is to ensure that every piece of furniture, decor item, and room layout aligns perfectly with the principles of Vastu Shastra. We focus on furniture placement for optimal energy flow, the selection of paintings, wall art, and decor items as per Vastu, and the proper placement of mirrors, clocks, and water fountains. By ensuring correct room orientation and energy balance, our expert Vastu consultants ensure that your interior space attracts maximum prosperity, happiness, and peace.</p>',
            ],
        ];

        foreach ($services as $service) {
            Service::create($service);
        }
    }
}
