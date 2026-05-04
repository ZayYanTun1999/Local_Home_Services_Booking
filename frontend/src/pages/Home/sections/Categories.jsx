export default function Categories({ categories }) {
    return (
        <section id="categories" className="py-5">
            <div className="container">

                <h2>Categories</h2>

                <div className="row">

                    {categories.map((cat) => (
                        <div key={cat.id} className="col-md-3">
                            <div className="card p-3">
                                <h5>{cat.name}</h5>
                                <p>{cat.service_count} Services</p>
                            </div>
                        </div>
                    ))}

                </div>

            </div>
        </section>
    );
}