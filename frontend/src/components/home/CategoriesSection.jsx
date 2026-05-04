export default function CategoriesSection({ categories }) {
    return (
        <section id="categories" className="py-5">
            <div className="container">
                <h2 className="text-center mb-5">Featured Categories</h2>

                <div className="row">
                    {categories.map((cat) => (
                        <div key={cat.id} className="col-md-3 mb-4">
                            <div className="card">
                                <img
                                    src={`/img/categories/${cat.image_path}`}
                                    className="card-img-top"
                                    alt={cat.name}
                                />
                                <div className="card-body text-center">
                                    <h5>{cat.name}</h5>
                                    <small>
                                        {cat.service_count} Services • {cat.provider_count} Providers
                                    </small>
                                </div>
                            </div>
                        </div>
                    ))}
                </div>
            </div>
        </section>
    );
}