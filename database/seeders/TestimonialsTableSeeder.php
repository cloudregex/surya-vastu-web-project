<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class TestimonialsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $testimonials = [
            [
                'testimonial_name' => 'Rahul Sharma',
                'testimonial_profession' => 'Business Owner',
                'testimonial_image' => 'default/testimonial.jpg',
                'testimonial_description' => 'Surya Vastu transformed my office space. The energy flow improved, and my business has seen significant growth since the consultation. Highly recommended!',
            ],
            [
                'testimonial_name' => 'Priya Patel',
                'testimonial_profession' => 'Homeowner',
                'testimonial_image' => 'default/testimonial.jpg',
                'testimonial_description' => 'The Vastu consultation for my home was excellent. The changes suggested were easy to implement, and I feel a positive difference in my daily life. Thank you!',
            ],
            [
                'testimonial_name' => 'Vikram Singh',
                'testimonial_profession' => 'Entrepreneur',
                'testimonial_image' => 'default/testimonial.jpg',
                'testimonial_description' => 'I was skeptical at first, but after applying the Vastu remedies, my factory\'s productivity increased, and the work environment became more harmonious.',
            ],
            [
                'testimonial_name' => 'Anjali Mehta',
                'testimonial_profession' => 'Interior Designer',
                'testimonial_image' => 'default/testimonial.jpg',
                'testimonial_description' => 'Surya Vastu\'s expertise in color therapy helped me design a client\'s home with the perfect color balance. The results were amazing!',
            ],
            [
                'testimonial_name' => 'Rajesh Kumar',
                'testimonial_profession' => 'Real Estate Developer',
                'testimonial_image' => 'default/testimonial.jpg',
                'testimonial_description' => 'The plot selection Vastu consultation was spot on. I’ve seen a noticeable improvement in the success of my projects. Great service!',
            ],
        ];

        foreach ($testimonials as $testimonial) {
            Testimonial::create($testimonial);
        }
    }
}
