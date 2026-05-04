import { useEffect, useState } from "react";
import { getCities, createCity, deleteCity } from "../../api/cityApi";

export default function Cities() {
  const [cities, setCities] = useState([]);
  const [name, setName] = useState("");

  const loadCities = async () => {
    const res = await getCities();
    setCities(res.data);
  };

  useEffect(() => {
    loadCities();
  }, []);

  const handleSubmit = async (e) => {
    e.preventDefault();
    await createCity({ name });
    setName("");
    loadCities();
  };

  const handleDelete = async (id) => {
    await deleteCity(id);
    loadCities();
  };

  return (
    <div style={{ padding: 20 }}>
      <h2>Cities</h2>

      <form onSubmit={handleSubmit}>
        <input
          value={name}
          onChange={(e) => setName(e.target.value)}
          placeholder="City name"
        />
        <button type="submit">Add</button>
      </form>

      <ul>
        {cities.map((c) => (
          <li key={c.id}>
            {c.name}
            <button onClick={() => handleDelete(c.id)}>Delete</button>
          </li>
        ))}
      </ul>
    </div>
  );
}