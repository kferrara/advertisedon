using System.Web.Mvc;
using System.Linq;
using AdvertisedOn.Models;
using PagedList;

namespace AdvertisedOn.Controllers
{
    public class HomeController : Controller
    {
        private AdvertisedOnDb db = new AdvertisedOnDb();

        //
        // GET: /Home/
        public ActionResult Index(string searchTerm = null, int page = 1)
        {
            if (Request.IsAjaxRequest())
            {
                return PartialView("_Business", db.Businesses.ToList().Take(6));
            }

            var model = db.Businesses
                    .OrderByDescending(b => b.Name)
                    .Where(b => searchTerm == null || b.Name.StartsWith(searchTerm))
                    .Select(b => b)
                    .ToPagedList(page, 6);
                    
            return View();
        }

        protected override void Dispose(bool disposing)
        {
            db.Dispose();
            base.Dispose(disposing);
        }
    }
}
