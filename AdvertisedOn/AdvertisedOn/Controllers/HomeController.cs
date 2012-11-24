using System.Web.Mvc;
using AdvertisedOn.Models;

namespace AdvertisedOn.Controllers
{
    public class HomeController : Controller
    {
        private readonly AdvertisedOnDb db = new AdvertisedOnDb();

        //
        // GET: /Home/
        public ActionResult Index()
        {
            return View();
        }

        protected override void Dispose(bool disposing)
        {
            db.Dispose();
            base.Dispose(disposing);
        }
    }
}
