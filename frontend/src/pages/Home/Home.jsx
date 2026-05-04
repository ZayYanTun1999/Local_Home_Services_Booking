import { useEffect, useState } from "react";

import Layout from "../../components/layout/Layout";
import { getCategories } from "../../api/categoryApi";

import Hero from "./sections/Hero";
import ProcessFlow from "./sections/ProcessFlow";
import About from "./sections/About";
import Services from "./sections/Services";
import Categories from "./sections/Categories";
import Testimonials from "./sections/Testimonials";
import FAQ from "./sections/FAQ";
import Contact from "./sections/Contact";

export default function Home({ openAuth }) {
    const [categories, setCategories] = useState([]);

    useEffect(() => {
        const fetchCategories = async () => {
            try {
                const res = await getCategories();
                setCategories(res);
            } catch (err) {
                console.error(err);
            }
        };

        fetchCategories();
    }, []);

    return (
        <Layout onOpenAuth={openAuth}>
            <Hero openAuth={openAuth} />
            <ProcessFlow />
            <About />
            <Services openAuth={openAuth} />
            <Categories categories={categories} />
            <Testimonials />
            <FAQ />
            <Contact />
        </Layout>
    );
}