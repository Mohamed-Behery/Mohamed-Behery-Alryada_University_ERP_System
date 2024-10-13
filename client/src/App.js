import { BrowserRouter as Router, Route, Routes } from "react-router-dom";
import "./index.css";
import Sidebar from "./components/Sidebar/Sidebar";
import Home from "./pages/Home/Home";
import ChartOfAccounts from "./pages/ChartOfAccounts/ChartOfAccounts";
import { useEffect, useState } from "react";
import Login from "./pages/Login/Login";
import ProtectedRoute from "./components/ProtectedRoute/ProtectedRoute";
import CashRegister from "./pages/CashRegister/CashRegister";
import NotFound from "./pages/NotFound/NotFound";

function App() {
  const [user, setUser] = useState(null);
  // const [loading, setLoading] = useState(true);

  useEffect(() => {
    const storedUser = localStorage.getItem("user");
    if (storedUser) {
      setUser(JSON.parse(storedUser));
    }
    // setLoading(false);
  }, []);

  const handleLogout = () => {
    localStorage.removeItem("user");
    setUser(null);
  };

  // if (loading) {
  //   return <LoadingSpinner />;
  // }

  return (
    <Router>
      <div style={{ display: "flex" }}>
        {user && <Sidebar user={user} onLogout={handleLogout} />}{" "}
        <div style={{ flex: 1 }}>
          <Routes>
            <Route path="/login" element={<Login setUser={setUser} />} />
            <Route
              path="/"
              element={
                <ProtectedRoute user={user}>
                  <Home />
                </ProtectedRoute>
              }
            />
            <Route
              path="/chart-of-accounts"
              element={
                <ProtectedRoute user={user} requiredRole="admin">
                  <ChartOfAccounts />
                </ProtectedRoute>
              }
            />
            <Route
              path="/cash-register"
              element={
                <ProtectedRoute user={user} requiredRole="admin">
                  <CashRegister />
                </ProtectedRoute>
              }
            />

            <Route path="*" element={<NotFound />} />
          </Routes>
        </div>
      </div>
    </Router>
  );
}

export default App;
