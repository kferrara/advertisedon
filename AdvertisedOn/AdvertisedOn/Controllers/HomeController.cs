using System.Web.Mvc;
using System.Linq;
using AdvertisedOn.Models;

namespace AdvertisedOn.Controllers
{
    public class HomeController : Controller
    {
        private AdvertisedOnDb db = new AdvertisedOnDb();

        //
        // GET: /Home/
        public ActionResult Index(string searchTerm = null)
        {
            if (Request.IsAjaxRequest())
            {
                return PartialView("_Business", db.Businesses.ToList().Take(10));
            }

            var model = db.Businesses
                    .OrderByDescending(b => b.Name)
                    .Take(10)
                    .Select(b => b);
                    
            return View();
        }

        protected override void Dispose(bool disposing)
        {
            db.Dispose();
            base.Dispose(disposing);
        }
    }
}
