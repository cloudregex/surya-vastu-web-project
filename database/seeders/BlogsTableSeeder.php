<?php

namespace Database\Seeders;

use App\Models\Blog;
use Illuminate\Database\Seeder;

class BlogsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $blogs = [
            [
                'blog_title' => 'The Importance of Vastu in Modern Homes',
                'blog_slug' => 'importance-of-vastu-in-modern-homes',
                'blog_user_name' => 'Surya Vastu',
                'blog_description' => '<p>In today\'s fast-paced world, the importance of Vastu in modern homes cannot be overstated. Vastu Shastra, an ancient Indian science of architecture, helps in creating harmonious living spaces by balancing the five elements of nature. This blog explores how Vastu principles can be applied to modern homes to enhance positivity, prosperity, and well-being. From the placement of rooms to the direction of the main entrance, we delve into practical tips and remedies that can transform your home into a sanctuary of peace and happiness.</p>',
                'blog_date' => '2023-10-15',
                'blog_image' => 'default/blog.jpg',
            ],
            [
                'blog_title' => 'How Vastu Can Boost Your Business Success',
                'blog_slug' => 'how-vastu-can-boost-business-success',
                'blog_user_name' => 'Surya Vastu',
                'blog_description' => '<p>Business success is not just about hard work and strategy; it\'s also about the energy flow in your workspace. Vastu Shastra offers practical solutions to enhance productivity, attract customers, and ensure financial growth. This blog discusses how Vastu principles can be applied to commercial spaces, including offices, shops, and factories. From the placement of the cash counter to the direction of the entrance, we provide actionable tips to create a balanced and prosperous business environment. Discover how Vastu can be your secret weapon for business success.</p>',
                'blog_date' => '2023-11-01',
                'blog_image' => 'default/blog.jpg',
            ],
            [
                'blog_title' => 'Color Therapy: The Vastu Way',
                'blog_slug' => 'color-therapy-the-vastu-way',
                'blog_user_name' => 'Surya Vastu',
                'blog_description' => '<p>Colors have a profound impact on our emotions, thoughts, and overall well-being. In Vastu Shastra, color therapy is used to balance the energy in your space and promote positivity. This blog explores the significance of colors in Vastu and how they can be used to enhance different areas of your home or office. From calming blues for relaxation to vibrant yellows for creativity, we provide insights into choosing the right colors for each room. Learn how color therapy can transform your space into a haven of peace and positivity.</p>',
                'blog_date' => '2023-11-20',
                'blog_image' => 'default/blog.jpg',
            ],
            [
                'blog_title' => 'Vastu Tips for a Prosperous Kitchen',
                'blog_slug' => 'vastu-tips-for-prosperous-kitchen',
                'blog_user_name' => 'Surya Vastu',
                'blog_description' => '<p>The kitchen is the heart of the home, and its energy plays a crucial role in the well-being of the family. According to Vastu Shastra, the placement of the kitchen, stove, and sink can significantly impact health and prosperity. This blog provides practical Vastu tips for designing a prosperous kitchen. From the ideal direction for the stove to the placement of storage cabinets, we cover everything you need to know to create a harmonious and positive kitchen environment. Follow these tips to ensure your kitchen radiates positive energy and supports your family\'s health and happiness.</p>',
                'blog_date' => '2023-12-05',
                'blog_image' => 'default/blog.jpg',
            ],
            [
                'blog_title' => 'The Role of Vastu in Plot Selection',
                'blog_slug' => 'role-of-vastu-in-plot-selection',
                'blog_user_name' => 'Surya Vastu',
                'blog_description' => '<p>Choosing the right plot for construction is the first step towards creating a harmonious living or working space. Vastu Shastra provides guidelines for selecting a plot that aligns with natural energy flows and promotes positivity. This blog explores the role of Vastu in plot selection, including the ideal shape, direction, and surroundings. We also discuss common Vastu defects in plots and how to remedy them. Whether you\'re planning to build a home or a commercial space, this blog will help you make an informed decision and lay the foundation for a prosperous future.</p>',
                'blog_date' => '2023-12-20',
                'blog_image' => 'default/blog.jpg',
            ],
            [
                'blog_title' => 'Vastu for Mental Peace and Emotional Well-being',
                'blog_slug' => 'vastu-for-mental-peace-and-emotional-well-being',
                'blog_user_name' => 'Surya Vastu',
                'blog_description' => '<p>Mental peace and emotional well-being are essential for a happy and fulfilling life. Vastu Shastra offers practical solutions to create a positive and harmonious environment that supports mental and emotional health. This blog explores how Vastu principles can be applied to your home or office to reduce stress, anxiety, and negativity. From the placement of the bedroom to the use of calming colors, we provide actionable tips to create a space that promotes relaxation and positivity. Discover how Vastu can help you achieve mental peace and emotional balance in your daily life.</p>',
                'blog_date' => '2024-01-10',
                'blog_image' => 'default/blog.jpg',
            ],
        ];

        foreach ($blogs as $blog) {
            Blog::create($blog);
        }
    }
}
