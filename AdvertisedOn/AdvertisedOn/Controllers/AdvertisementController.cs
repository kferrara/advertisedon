using System.Collections.Generic;
using System.Data;
using System.Linq;
using System.Web.Mvc;
using AdvertisedOn.ViewModels;
using AdvertisedOn.Models;

namespace AdvertisedOn.Controllers
{
    public class AdvertisementController : Controller
    {
        private AdvertisedOnDb db = new AdvertisedOnDb();

        //
        // GET: /Advertisement/
        public ActionResult Index()
        {
            var ads = db.Advertisements.ToList();

            return View(ads);
        }

        //
        // GET: /Advertisement/Details/5
        public ActionResult Details(int id = 0)
        {
            var ad = db.Advertisements.Find(id);

            if (ad == null)
            {
                return HttpNotFound();
            }

            return View(ad);
        }

        //
        // GET: /Advertisement/Create
        [Authorize(Roles = "Administrator")]
        public ActionResult Create()
        {
            var regionList = db.RegionTypes.ToList();
            var businessList = db.Businesses.ToList();
            var viewModel = new ViewModelAdvertisement { RegionTypeId = regionList[0].RegionTypeId, RegionTypes = regionList, BusinessId = businessList[0].BusinessId, Businesses = businessList };

            return View(viewModel);
        }

        //
        // POST: /Advertisement/Create
        [HttpPost]
        public ActionResult Create(ViewModelAdvertisement vmAd)
        {
            // Need to add a cache for this reference data
            var ad = new Advertisement(vmAd)
            {
                Business = db.Businesses.Find(vmAd.BusinessId),
                Regions = new List<Region> { new Region() { RegionId = vmAd.RegionTypeId, Type = db.RegionTypes.Find(vmAd.RegionTypeId) } }
            };

            if (ModelState.IsValid)
            {
                db.Advertisements.Add(ad);
                db.SaveChanges();

                return RedirectToAction("Index");
            }

            return View(ad);
        }

        //
        // GET: /Advertisement/Edit/5
        public ActionResult Edit(int id = 0)
        {
            var ad = db.Advertisements.Find(id);

            if (ad == null)
            {
                return HttpNotFound();
            }

            var regionList = db.RegionTypes.ToList();
            var businessList = db.Businesses.ToList();

            var viewModel = new ViewModelAdvertisement
            {
                AdvertisementId = ad.AdvertisementId,
                HeadingId = ad.Heading.HeadingId,
                RegionId = ad.Regions.FirstOrDefault() == null ? 1 : ad.Regions.FirstOrDefault().RegionId,
                RegionTypeId = regionList.FirstOrDefault().RegionTypeId,
                RegionTypes = regionList,
                BusinessId = businessList.FirstOrDefault().BusinessId,
                Businesses = businessList,
                HeadingText = ad.Heading.Text,
                EffectiveDate = ad.EffectiveDate,
                ExporationDate = ad.ExporationDate
            };

            return View(viewModel);
        }

        //
        // POST: /Advertisement/Edit/5
        [HttpPost]
        public ActionResult Edit(ViewModelAdvertisement vmAd)
        {
            var ad = db.Advertisements.Find(vmAd.AdvertisementId);
            ad.Business = db.Businesses.Find(vmAd.BusinessId);
            
            if (ad.Regions.FirstOrDefault(r => r.RegionId == vmAd.RegionId) != null)
            {
                ad.Regions.First(r => r.RegionId == vmAd.RegionId).Type =
                    vmAd.RegionTypes.Find(r => r.RegionTypeId == vmAd.RegionTypeId);
            }
            else
            {
                ad.Regions = new List<Region> { new Region() { RegionId = vmAd.RegionTypeId, Type = db.RegionTypes.Find(vmAd.RegionTypeId) } };
            }


            if (ModelState.IsValid)
            {
                db.Entry(ad).State = EntityState.Modified;
                // I should nor have to do this. There should be a cascading update?
                db.Entry(ad.Heading).State = EntityState.Modified;

                db.SaveChanges();

                return RedirectToAction("Index");
            }

            return View(ad);
        }

        //
        // GET: /Advertisement/Delete/5
        public ActionResult Delete(int id = 0)
        {
            var ad = db.Advertisements.Find(id);

            if (ad == null)
            {
                return HttpNotFound();
            }

            return View(ad);
        }

        //
        // POST: /Advertisement/Delete/5
        [HttpPost, ActionName("Delete")]
        public ActionResult DeleteConfirmed(int id)
        {
            var ad = db.Advertisements.Find(id);

            db.Advertisements.Remove(ad);
            db.SaveChanges();

            return RedirectToAction("Index");
        }

        protected override void Dispose(bool disposing)
        {
            db.Dispose();
            base.Dispose(disposing);
        }
    }
}