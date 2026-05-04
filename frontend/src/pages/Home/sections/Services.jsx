export default function Services({ openAuth }) {
    return (
        <section id="services" className="py-5">
            <div className="container">

                <h2>Services</h2>

                <p>Browse, book, and track services easily.</p>

                <button
                    className="btn btn-primary"
                    onClick={openAuth}
                >
                    Create Account
                </button>

            </div>
        </section>
    );
}