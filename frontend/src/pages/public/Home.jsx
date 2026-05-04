import { useEffect, useState } from "react";

import Layout from "../../components/layout/Layout";

import HeroSection from "../../components/home/HeroSection";
import ProcessFlow from "../../components/home/ProcessFlow";
import AboutSection from "../../components/home/AboutSection";
import ServicesSection from "../../components/home/ServicesSection";
import CategoriesSection from "../../components/home/CategoriesSection";
import Testimonials from "../../components/home/Testimonials";
import FAQ from "../../components/home/FAQ";
import Contact from "../../components/home/Contact";

import { getCategories } from "../../api/categoryApi";

export default function Home() {
    const [categories, setCategories] = useState([]);

    useEffect(() => {
        const fetchCategories = async () => {
            try {
                const data = await getCategories();
                setCategories(data);
            } catch (error) {
                console.error("Failed to load categories:", error);
            }
        };

        fetchCategories();
    }, []);

    return (
        <Layout>
            {/* HERO */}
            <section id="home">
                <HeroSection />
            </section>

            {/* PROCESS */}
            <ProcessFlow />

            {/* ABOUT */}
            <AboutSection />

            {/* SERVICES */}
            <ServicesSection />

            {/* CATEGORIES (API DATA) */}
            <CategoriesSection categories={categories} />

            {/* TESTIMONIALS */}
            <Testimonials />

            {/* FAQ */}
            <FAQ />

            {/* CONTACT */}
            <Contact />
        </Layout>
    );
}